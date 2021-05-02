<?php


class Employee{

    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    public function all(){
        
        $sql="SELECT * FROM `employees`";
        
        $this->db->query($sql);
        $results=$this->db->resultSet();

        return $results;
    }

    public function paginate($limit=10){

        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $offset = ($_GET['page']-1)*$limit;
            $currentPage = $_GET['page'];
        }else{
            $offset = 0;
            $currentPage = 1;
        }
        
        $sql="SELECT * FROM `employees` ORDER BY `id` DESC LIMIT ?, ?";
        
        $this->db->query($sql);
        $this->db->bind(1, intval($offset),\PDO::PARAM_INT);
        $this->db->bind(2, intval($limit),\PDO::PARAM_INT);
        $results['employees'] = $this->db->all();

        $results['employees_count'] = $this->employeesCount();
        $results['current_page'] = $currentPage;
        $results['per_page'] = $limit;
        $results['total_pages'] = floor($results['employees_count']/$limit)+1;

        return $results;
    }

    public function find($id){
        
        $sql="SELECT `employees`.`id`,`first_name`,`last_name`,`age`,`email`,`salary`,`admin`,`blocked`,`deleted`,`profession_id`,`professions`.`name` AS 'profession_name' FROM `employees` INNER JOIN `professions` ON `employees`.`profession_id` = `professions`.`id` WHERE `employees`.`id` = ?"; 
        $this->db->query($sql);
        $this->db->bind(1,$id);
        $row = $this->db->single();
      
        return $row;
    }

    public function employeesCount(){
        $sql="SELECT COUNT(*) AS 'employees_count' FROM `employees`"; 
        $this->db->query($sql);
        $row = $this->db->single();
        return $row['employees_count'];
    }

    public function create($data){
        $sql = "INSERT INTO `employees` (`first_name`,`last_name`,`age`,`email`,`password`,`profession_id`,`salary`) VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql);
        $this->db->bind(1, $data['first_name']);
        $this->db->bind(2, $data['last_name']);
        $this->db->bind(3, $data['age']);
        $this->db->bind(4, $data['email']);
        $this->db->bind(5, $data['password']);
        $this->db->bind(6, $data['profession_id']);
        $this->db->bind(7, $data['salary']);
       
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function updatePassword($id, $data){

        $sql = 'UPDATE `employees` SET `password`=? WHERE `id`=?';

        $this->db->query($sql);
        $this->db->bind(1, $data['password']);
        $this->db->bind(2, $id);
       
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($id, $data){
        $sql = "UPDATE `employees` SET `first_name`=?, `last_name`=?, `age`=?, `email`=?,`admin`=?, `profession_id`=?, `salary`=? WHERE `id`=?;";

        $this->db->query($sql);
    
        $this->db->bind(1, $data['first_name']);
        $this->db->bind(2, $data['last_name']);
        $this->db->bind(3, $data['age']);
        $this->db->bind(4, $data['email']);
        $this->db->bind(5, $data['admin']);
        $this->db->bind(6, $data['profession_id']);
        $this->db->bind(7, $data['salary']);
        $this->db->bind(8, $id);
  
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM `employees` WHERE `id`=?";
        $this->db->query($sql);
        $this->db->bind(1, $id);
       
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function blockToggle($id,$block=true){
        $sql = "UPDATE `employees` SET `blocked`=? WHERE `id`=?";
        $this->db->query($sql);
        $this->db->bind(1, $block);
        $this->db->bind(2, $id);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function attempt($data){
        $sql = "SELECT * FROM `employees` WHERE `email`=?";
        $this->db->query($sql);
        $this->db->bind(1,$data['email']);
        $row = $this->db->single();
        if(is_array($row)){
            if(password_verify($data['password'],$row['password'])){
                unset($row['password']);
                return $row;
            }
                
            return false;
        }
        
        return false;
    }

    public function getProfession(){
        $sql="SELECT `professions`.`name` AS 'profession_name' FROM `employees` INNER JOIN `professions` ON `employees`.`profession_id` = `professions`.`id` WHERE `employees`.`id` = ? GROUP BY employees.id"; 
        $this->db->query($sql);
        $this->db->bind(1,auth()['id']);
        $row = $this->db->single();
        return $row['profession_name'];
    }
}
