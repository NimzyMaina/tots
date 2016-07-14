<?php

class MY_Model extends CI_Model
{
    public $table;

    public function get_all(){
        return $this->db->get($this->table)->result();
    }

    public function get_one($id){
        return  $this->db->where('id',$id)->get($this->table)->result();
    }

    public function get_one_array($id){
        return  $this->db->where('id',$id)->get($this->table)->result_array();
    }

    public function edit($id,$data = array()){
        if ($this->db->where('id',$id)->update($this->table,$data)){
//            echo $this->db->last_query();
//            exit;
            return true;
        }
        return false;
    }

    public function delete($id){
        if($this->db->where('id',$id)->delete($this->table)){
            return true;
        }
        return false;
    }

    public function check_user_before_delete($id){
        if($this->db->where('id',$id)->delete($this->table)){
            return true;
        }
        return false;
    }

    public function check_user(){

    }

    public function create($data = array()){
        if($this->db->insert($this->table,$data)){
            return true;
        }
        return false;
    }

    function get_random($no = 1){
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit($no);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function getcount(){
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
}