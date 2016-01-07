<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


    var $table = 'users';


    function create($data) {
        $now = new DateTime();
        $newData = array_merge($data, ['created' => $now->format(MYSQL_DATETIME_FORMAT)]);

        if ($this->db->insert('users', $newData)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function getForLogin($user_name, $password) {
        $query = $this->db->get_where('users', [
            'user_name' => $user_name,
            'password' => md5($password)], 1);


        if ($query->num_rows() > 0) {

            $user = $query->row();

            return $user;
        }

        return false;
    }

    function getAll($limit = false) {
        $this->db->select(self::FIELDS);
        $this->db->join('countries', 'countries.id = users.country_id', 'left');

        if ($limit)
            $this->db->limit($limit);

        $query = $this->db->get('users');

        $users = $query->result();

        foreach ($users as $user) {
            $this->format($user);
        }

        return $users;
    }

    function get($id) {
        $this->db->select(self::FIELDS);
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $query = $this->db->get_where('users', ['users.id' => $id], 1);

        if ($query->num_rows() > 0) {
            $user = $query->row();

            $this->format($user);

            return $user;
        }

        return null;
    }

    function update($id, $data) {
        if (isset($data['social_links'])) {
            $data['social_links'] = json_encode($data['social_links']);
        }

        $this->db->where('users.id', $id);
        $this->db->update('users', $data);
    }

    function delete($id) {
        $query = $this->db
            ->select('*')
            ->get_where('users', ['users.id' => $id], 1);

        if ($query->num_rows() > 0) {
            $user = $query->row();
            $user->id = '';
            $user->is_active = '-1';

            $this->db->insert('inactive_users', $user);

            $this->db->delete('users', ['id' => $id]);
        }

    }

}
