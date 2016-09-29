<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['categories'] = $this->category_model->get_all();
        $this->data['title'] = 'Manage Categories';
        $this->display('pages/category/manage',$this->data);
    }

    public function create(){
        $this->form_validation->set_rules('name', 'Category Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('description','Category Description','required|callback_alpha_only_space');


        if($this->form_validation->run() == true){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');

            if($this->category_model->create($data)){
                $this->session->set_flashdata('success' ,'Category Created Successfully');
                redirect('category/create','refresh');
            }
            $this->session->set_flashdata('error' ,'Category Not Created Successfully');
            redirect('category/create');
        }else {
            $this->data['title'] = 'Create Category';
            $this->display('pages/category/form',$this->data);
        }
    }

    public function remove($id){
        if(!$id){
            $this->session->set_flashdata('error','Missing Category ID');
            redirect('category/manage');
        }

        if($this->category_model->delete($id)){
            $this->session->set_flashdata('success','Deleted Category Successfully');
            redirect('category/manage');
        }
        $this->session->set_flashdata('error','Could Not Delete Category Successfully');
        redirect('category/manage');
    }

    public function edit($id){
        if(!$id){
            $this->session->set_flashdata('error','Missing Category ID');
            redirect('category/manage');
        }

        $category = $this->category_model->get_one($id);
        $this->data['name'] = $category[0]->name;
        $this->data['description'] = $category[0]->description;

        $this->form_validation->set_rules('name', 'Category Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('description','Category Description','required|callback_alpha_only_space');

        if($this->form_validation->run() == true){
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            if($this->category_model->edit($id,$data)){
                $this->session->set_flashdata('success','Edited Category Successfully');
                redirect('category/edit/'.$id);
            }
            $this->session->set_flashdata('error','Could Not Edit Category Successfully');
            redirect('category/edit/'.$id);
        }else{
            $this->data['title'] = 'Edit Category';
            $this->display('pages/category/form',$this->data);
        }
    }

}