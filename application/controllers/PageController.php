<?php

class PageController extends MY_Controller
{
    //public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = 'Dashboard';
        $this->data['unum'] = $this->user_model->getcount();
        $this->display('dashboard',$this->data);
    }
}