<?php

class Product_Model extends MY_Model
{
    public $table = 'products';

    public function get_by_cat($id, $data = null){
        $tmp = array();
        if(isset($data) && $data != ''){
            //   array_push($tmp,$data);
            $this->db->where('gender',$data);
        }
        $tmp['category_id'] = $id;
        return $this->db->where($tmp)->get($this->table)->result();
    }

    public function search($data){
        $re =  $this->db->like('name',$data)->or_like('description',$data)->get($this->table)->result();
        //$this->db->
        return $re;
    }

}