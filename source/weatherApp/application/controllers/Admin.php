<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {

        $_USER = $this->session->userdata('user');

        if ($_USER->id) {

            $data['city'] = $this->input->post('cityname');

            $data['list'] = $this->search_model->getAll($data['city']);



            $this->load->view('admin', $data);

        } else {

            redirect('admin/logout');
        }
    }


    public function login()
    {

        if ($this->input->post('action') == 'login') {

$user['user'] = $this->admin_model->getForLogin($this->input->post('user_name'), $this->input->post('password'));

            $this->session->set_userdata($user);

            if ($user['user']->id) {
                redirect('admin/');
            } else {
                $data['message'] = 'Error login!';
            }

        }
        $this->load->view('login', $data);
    }


    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('admin/login');
    }


    public function delete()
    {

        $_USER = $this->session->userdata('user');

        if ($_USER->id) {

            $this->search_model->delete($this->input->post('checkbox'));

            redirect('admin');
        } else {

            redirect('admin/logout');
        }
    }

}
