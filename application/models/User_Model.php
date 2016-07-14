<?php

class User_Model extends MY_Model
{

    public $table = 'users';

    function login($email, $password)
    {
        $field = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where($field, $email);
        $this -> db -> where('password', sha1($password));
        $this->db->where('active',true);
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


    function register(){
        $confirm_code = md5(uniqid(rand()));
        try {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'role' => 'customer',
                'profile' => 'avatar.png',
                'confirm' => $confirm_code,
                'password' => sha1($this->input->post('password')),
                'active' => false
            );
            $this->db->insert('users',$data);

            $to = $data['email'];
            $name = ucfirst($data['fname'].' '.$data['lname']);
            $title = 'Confirm Your Registration';
            $message = 'Click on this link to activate your account '.base_url().'confirmation/?code='.$confirm_code.
                '<br> Your password is '.$this->input->post('password');

            if($this->mailer_model->mail($to,$name,$title,$message)){
                return true;
            }
            return false;

        } catch (Exception $e) {
            echo 'ERROR: '.$e;
        }
    }

    public function confirm($code){
        if($this->db->where('confirm' ,$code)->update($this->table,['active' => true])){
            return true;
        }
        return false;
    }

    public function get_name($id){
        $result =$this->db->where('id',$id)->get($this->table)->result();
        return $result[0]->fname . ' '. $result[0]->lname;
    }

    public function reset($email,$password){
        if($this->db->where('email',$email)
        ->update($this->table,['password' => sha1($password)])){
            $this->mailer_model->mail($email,'Dear User','Password Recovery','This is your new password '.$password);
            return true;
        }
        return false;
    }
}