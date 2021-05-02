<?php


class Profession{

    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    public function all(){
        
        $sql="SELECT * FROM `professions`";
        
        $this->db->query($sql);
        $results=$this->db->all();

        return $results;
    }

    public function find($id){
        
        $sql="SELECT * FROM `professions` WHERE `id`=?"; 
        $this->db->query($sql);
        $this->db->bind(1,$id);
        $row = $this->db->single();
        return $row;
    }

    public function create($data){
        $sql = "INSERT INTO `professions` (`name`) VALUES (?)";
        $this->db->query($sql);
        $this->db->bind(1, $data['name']);
       
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($id, $data){
        $sql = "UPDATE `professions` SET `name`=? WHERE `id`=?;";

        $this->db->query($sql);
    
        $this->db->bind(1, $data['name']);
        $this->db->bind(2, $id);
        
        if($this->db->execute()){
            
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM `professions` WHERE `id`=?";
        $this->db->query($sql);
        $this->db->bind(1, $id);
        
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
