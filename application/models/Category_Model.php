<?php
class Category_Model extends MY_Model
{
    public $table = 'categories';

    public function get_name($id){
        $result =$this->db->where('id',$id)->get($this->table)->result();
        return $result[0]->name;
    }
}