<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();

        //check logged in Auth_helper.php
        check_auth();
        //check admin in Auth_helper.php
        //check_admin();

        $user = $this->session->userdata('logged_in');
        $this->data['fullname'] = $user['fullname'];
        $this->data['email'] = $user['email'];
        $this->data['role'] = $user['role'];
        $this->data['profile'] = $user['profile'];
    }

    //custom validation function for dropdown input
    public function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid %s field is required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //custom validation function to accept only alpha and space input
    public function alpha_only_space($str)
    {
        if (!preg_match("/^([-a-z ])+$/i", $str))
        {
            $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function do_upload($filename){
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
//            echo '<pre>';
//            print_r($error);
//            exit();
            $this->form_validation->set_message('do_upload', $error);
            return false;
        }
        $_POST['image_name'] = $this->upload->data('file_name');

        return true;
    }

    function get_combo($select,$table){
        $this->db->select('id');
        $this->db->select($select);
        $this->db->from($table);
        $query = $this->db->get();
        $result = $query->result_array();

        $item_id = array('-SELECT-');
        $item_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($item_id, $result[$i]['id']);
            array_push($item_name, $result[$i][$select]);
        }
         return $item_result = array_combine($item_id, $item_name);

    }

    function display($view,$data = null){
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/sidemenu');
        $this->load->view($view);
        $this->load->view('layouts/footer');
    }

    function pos($view,$data = null){
        $this->load->view('layouts/pos_header',$data);
        $this->load->view($view);
        $this->load->view('layouts/footer');
    }
}