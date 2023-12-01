<?php
class task_model extends CI_Model{
    protected $table = "tasks";
    protected $pk = "id";
    protected $fk = "user_id";

    public function getAll($user=null){
        if (!is_null($user)){
            $this->db->where($this->fk,$user);
            $result = $this->db->get($this->table);
            if ($this->db->affected_rows()){
                return $result->result_array();
            }
        }
    }

    public function getByID($id){
        $this->db->where($this->pk,$id);
        $this->db->limit(1);
        $result = $this->db->get($this->table);
        if ($this->db->affected_rows()){
            return $result->row_array();
        }
    }

    public function create($data=array()){
        $this->db->insert($this->table,$data);
        if ($this->db->affected_rows()){
            return $this->db->insert_id();
        }
        return false;
    }

    public function delete($id=null){
        if (!is_null($id)){
            $this->db->where($this->pk,$id);
            $this->db->limit(1);
            $this->db->delete($this->table);
            if($this->db->affected_rows()){
                return true;
            }
        }
        return false;
    }

    public function update($id=null,$data=array()){
        if (!is_null($id)){
            $this->db->where($this->pk,$id);
            $this->db->limit(1);
            $this->db->update($this->table,$data);
        }
    }
}
?>