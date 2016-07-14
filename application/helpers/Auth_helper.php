<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_auth'))
{
    function check_auth()
    {
        $CI =& get_instance();

        if(!$CI->session->userdata('logged_in')){
            $CI->session->set_flashdata('error', 'Unauthorized Access Please Login');
            redirect('login');
        }
        return true;

    }
}

if ( ! function_exists('check_admin'))
{
    function check_admin()
    {
        $CI =& get_instance();

        $user = $CI->session->userdata('logged_in');

        if($user['role'] === 'admin'){
            return true;
        }
        $CI->session->set_flashdata('error', 'Unauthorized Access Please Login');
        redirect('login');
    }
}

if ( ! function_exists('check_login'))
{
    function check_login()
    {
        $CI =& get_instance();

        if(!$CI->session->userdata('logged_in')){
            $CI->session->set_flashdata('error', 'Please Login To Checkout');
            redirect('login');
        }
        return true;
    }
}