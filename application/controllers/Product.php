<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = 'Manage Products';
        $this->data['products'] = $this->product_model->get_all();
        $this->display('pages/product/manage',$this->data);
    }

    public function create(){
        $this->form_validation->set_rules('name','Product Name','required|is_unique[products.name]|callback_alpha_only_space');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('category_id','Category','callback_combo_check');
        $this->form_validation->set_rules('active','Active','callback_combo_check');
        $this->form_validation->set_rules('image','Image','callback_do_upload');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('gender','Gender','required');

        if($this->form_validation->run() == true){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['category_id'] = $this->input->post('category_id');
            $data['active'] = $this->input->post('active');
            $data['price'] = $this->input->post('price');
            $data['image'] = $this->input->post('image_name');
            $data['gender'] = $this->input->post('gender');

            if($this->product_model->create($data)){
                $this->session->set_flashdata('success','Product Created Successfully');
                redirect('product/create','refresh');
            }

            $this->session->set_flashdata('error','Product Could Not Be Created Successfully');
            redirect('product/create');
        }else{
            $this->data['title'] = 'Create Product';
            $this->data['categories'] = $this->get_combo('name','categories');
            $this->display('pages/product/form',$this->data);
        }
    }

    public function edit($id){
        $this->form_validation->set_rules('name','Product Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('category_id','Category','callback_combo_check');
        $this->form_validation->set_rules('active','Active','callback_combo_check');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
//        if(is_uploaded_file($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])){
//            $this->form_validation->set_rules('image','Image','callback_do_upload');
//        }

        if($this->form_validation->run() == true){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['category_id'] = $this->input->post('category_id');
            $data['active'] = $this->input->post('active');
            $data['price'] = $this->input->post('price');
            $data['gender'] = $this->input->post('gender');
            if($_FILES && $_FILES['image']['name']){
                $this->do_upload('image');
            }
            if(null != $this->input->post('image_name')) {
                $data['image'] = $this->input->post('image_name');
            }

            if($this->product_model->edit($id,$data)){
                $this->session->set_flashdata('success','Product Created Successfully');
                redirect('product/edit/'.$id,'refresh');
            }

            $this->session->set_flashdata('error','Product Could Not Be Created Successfully');
            redirect('product/edit/'.$id);
        }else{
            $product = $this->product_model->get_one($id);
            $this->data['name'] = $product[0]->name;
            $this->data['description'] = $product[0]->description;
            $this->data['category_id'] = $product[0]->category_id;
            $this->data['active'] = $product[0]->active;
            $this->data['price'] = $product[0]->price;
            $this->data['image'] = $product[0]->image;
            $this->data['gender'] = $product[0]->gender;
            $this->data['title'] = 'Edit Product';
            $this->data['categories'] = $this->get_combo('name','categories');
            $this->display('pages/product/manage',$this->data);
        }
    }

    public function remove($id){
        if(!$id){
            $this->session->set_flashdata('error','Missing Product ID');
            redirect('product/manage');
        }

        if($this->product_model->delete($id)){
            $this->session->set_flashdata('success','Deleted Product Successfully');
            redirect('product/manage');
        }
        $this->session->set_flashdata('error','Could Not Delete Product Successfully');
        redirect('product/manage');
    }

}