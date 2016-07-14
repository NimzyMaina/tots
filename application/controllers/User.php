<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = 'Manage Users';
        $this->data['users'] = $this->user_model->get_all();

        $this->display('pages/user/manage',$this->data);
    }

    public function create(){
        $this->form_validation->set_rules('fname','First Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('lname','Last Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('role','Role','callback_combo_check');
        $this->form_validation->set_rules('password','Password','required|matches[confirm]');
        $this->form_validation->set_rules('confirm','Confirm Password','required');

        if($this->form_validation->run() == true){
            if($this->user_model->register()){
                $this->session->set_flashdata('success','Account Created Successfully.');
                redirect('users/create');
            }
            $this->session->set_flashdata('error','Account Could Not Be Successfully.');
            redirect('users/create');
        }else{
            $this->data['title'] = 'Create User';
            $this->display('pages/user/form',$this->data);
        }
    }

    public function remove($id){
        if(!$id){
            $this->session->set_flashdata('error','Missing User ID');
            redirect('users/manage');
        }

        if($this->user_model->delete($id)){
            $this->session->set_flashdata('success','Deleted User Successfully');
            redirect('users/manage');
        }
        $this->session->set_flashdata('error','Could Not Delete User Successfully');
        redirect('users/manage');
    }

    public function edit($id){
        $this->form_validation->set_rules('fname','First Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('lname','Last Name','required|callback_alpha_only_space');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('role','Role','callback_combo_check');

        $user = $this->user_model->get_one($id);
        $this->data['fname'] = $user[0]->fname;
        $this->data['lname'] = $user[0]->lname;
        $this->data['uemail'] = $user[0]->email;
        $this->data['phone'] = $user[0]->phone;
        $this->data['urole'] = $user[0]->role;
        $this->data['switch'] = true;

        if($this->form_validation->run() == true){
            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['role'] = $this->input->post('role');
            if($this->user_model->edit($id,$data)){
                $this->session->set_flashdata('success','User Edited Successfully.');
                redirect('users/edit/'.$id);
            }
            $this->session->set_flashdata('error','User Could Not Be Edited Successfully.');
            redirect('users/edit/'.$id);
        }else{
            $this->data['title'] = 'Edit User';
            $this->display('pages/user/form',$this->data);
        }
    }
    
}