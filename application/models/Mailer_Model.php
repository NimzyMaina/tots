<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/24/2016
 * Time: 12:06 AM
 */
class Mailer_Model extends CI_Model
{
    function mail($to,$name,$subject,$message){
        //sending user email
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'nimzy.maina@gmail.com',
            'smtp_pass' => '*nimzy007056'
        );

        $this->load->library('email',$config);

        $this->email->set_newline("\r\n");

        $this->email->from($config['smtp_user'], 'Cuddly Tots');
        $this->email->to($to,$name);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()){
            return true;
        }
        else{
            show_error($this->email->print_debugger());
            return false;
        }
    }
}