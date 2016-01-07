<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model
{
   var $table = 'findlocation';
    function cron($data)
    {
        if ($data) {
            $id = $data;
            $arrayLenght = 1;
        } else {
            $list = $this->getAll();

            $id = '';
            foreach ($list AS $key => $value) {
                $id .= $value->city_id . ',';
            }
            $arrayLenght = count($list);
        }
        $baseurl = 'http://api.wunderground.com/api/Your_Key/geolookup/conditions/q/IA/';
        $units = '&units=metric';
        $apikey = '3660a05c494f50cd';
        $fullurl = "{$baseurl}{$id}{$units}{$apikey}";
        $jsondata = file_get_contents("{$fullurl}");

        $data = json_decode($jsondata, true);

        for ($x = 0; $x < $arrayLenght; $x++) {
            $newData = array(
                'date' => date('d.m.Y'),
                'time' => date('H:i'),
                'city' => $data['list'][$x]['name'],
                'city_temperature' => $data['list'][$x]['main']['temp'],
                'city_humidity' => $data['list'][$x]['main']['humidity'],
                'city_wind' => $data['list'][$x]['wind']['speed'],
                'city_description' => $data['list'][$x]['weather'][0]['description'],
                'city_icon' => $data['list'][$x]['weather'][0]['icon'],
                'city_id' => $data['list'][$x]['id']
            );
            $this->db->insert($this->table, $newData);
        }
    }
    function getAll($cityname = false)
    {
        $this->db->select('*');
        if ($cityname)
            $this->db->where('city', $cityname);
            $query = $this->db->get($this->table);
            $users = $query->result();
        return $users;
    }}
