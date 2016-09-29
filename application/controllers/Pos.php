<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Pos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index(){
        $this->data['title'] = 'POS';
        $this->pos('pages/pos/pos',$this->data);
    }

    public function checkout(){
        $this->data['title'] = 'Checkout';
        if($this->cart->total_items() == 0){
            $this->session->set_flashdata('error' ,'Your Cart Is Empty');
            redirect('pos');
        }

        $this->pos('pages/pos/checkout',$this->data);
    }

}