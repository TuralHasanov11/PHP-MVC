<?php


class User extends Controller{

    public function __construct(){
        $this->employeeModel = $this->model('Employee');

        if(!authMiddleware()){
            redirect();
        }
    }

    public function index(){ 

    }

    public function profile(){
        $data=auth();
        $data['profession_name'] = $this->employeeModel->getProfession();

        $this->view('auth/profile', ['employee'=>$data]);
    }

    public function updatePassword(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            csrfToken();

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            if($data = $this->validateUpdatedPasswords($_POST)){

                if($employee = $this->employeeModel->attempt(['email'=>auth()['email'],'password'=>$data['password']])){
                    
                    if($this->employeeModel->updatePassword(intval(auth()['id']),['password'=>password_hash($data['new_password'],PASSWORD_DEFAULT)])){ 
                        redirect("user/profile");
                    }
                    else{
                        die("Uğursuz əməliyyat");
                    } 
                }

            }
            else{
                redirect("user/profile");
            }
        }
        
    }

    public function logout(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            unset($_SESSION['is_authenticated'], $_SESSION['employee']);
            session_destroy();
        }

        redirect();
    }

    public function validateUpdatedPasswords($data){
        if(isset($data['password'],$data['new_password'],$data['confirm_password']) && !empty($data['password']) && !empty($data['new_password']) && !empty($data['confirm_password']) && $data['new_password']===$data['confirm_password']){
            return $data;
        }

        return false;
    }
} 