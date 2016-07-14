<?php

class AuthController extends CI_Controller
{

    public $data;

    public function __construct()
    {
        parent::__construct();
    }
    //Login the user
    public function index(){
        $validation = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL) ? 'required|valid_email' : 'required';
        $this->form_validation->set_rules('email', 'Email/Phone No', $validation);
        $this->form_validation->set_rules('password', 'Password', 'required|callback_check_database');

        if($this->form_validation->run() == true){
            redirect('dashboard');
        }else{
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
                'placeholder' => 'Enter Your Email/Phone No'
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Enter Your Password'
            );
            return $this->load->view('auth/login',$this->data);
        }
    }

    //Check if user is in db
    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');

        //query the database
        $result = $this->user_model->login($email, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'fullname' => $row->fname.' '.$row->lname,
                    'role'=> $row->role,
                    'firstname'=> $row->fname,
                    'lastname' => $row->lname,
                    'phone' => $row->phone,
                    'profile' => $row->profile,
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid E-mail or password');
            return false;
        }
    }

    //Logout
    function  logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('message','Logout Successful');
        redirect('login');
    }

    //reset password
    public function password(){
        $this->form_validation->set_rules('email','Email','required');

        if($this->form_validation->run() == true){
            if($this->user_model->reset($this->input->post('email'),uniqid())){
                $this->session->set_flashdata('message','Password Sent To Your Email Successfully.');
                redirect('login');
            }else{
                $this->session->set_flashdata('error','Password Could Not Be Reset.');
                redirect('password');
            }

        }
        else {
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
                'placeholder' => 'Enter Your Email'
            );
            $this->load->view('auth/password', $this->data);
        }
    }


    public function confirmation(){
        if(null == $this->input->get('code')){
            $this->session->set_flashdata('error','Missing Activation code.');
            redirect('login');
        }

        if($this->user_model->confirm($this->input->get('code'))){
            $this->session->set_flashdata('success','Account Activated Successfully.');
            redirect('login');
        }
        $this->session->set_flashdata('error','Invalid Activation code.');
        redirect('login');
    }

}