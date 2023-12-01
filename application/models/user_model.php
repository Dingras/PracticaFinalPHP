<?php
class user_model extends CI_Model{
    protected $table = "users";
    protected $pk = "id";
    protected $user="user";
    protected $password="password";

    public function auth($_user,$_password){
        $this->db->where($this->user,$_user);
        $this->db->where($this->password,$_password);
        $this->db->limit(1);
        $result=$this->db->get($this->table);
        if ($this->db->affected_rows()){
            $id = $result->row_array()[$this->pk];
            return $id;
        }
        return false;
    }

}
?>