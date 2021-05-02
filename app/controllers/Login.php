<?php


class Login extends Controller{

    public function __construct(){
        $this->employeeModel=$this->model('Employee');

        if(authMiddleware()){
            redirect();
        }
    }

    public function index(){ 
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();
           
            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            $data = $this->validate($_POST);

            if($data && $employee = $this->employeeModel->attempt($data)){
                if(!$employee['blocked']){
                    $_SESSION['is_authenticated']=true;
                    $_SESSION['employee']=$employee;
                    redirect();
                }else{
                    redirect('login');
                }
            }
            else{
                redirect('login');
            }
           
        }else{
            $this->view('auth/login');
        }
    }

    

    public function validate($data){
        
        if(isset($data['email'],$data['password']) && !empty($data['email']) && !empty($data['password']) && preg_match("/^((\w+)@([a-zA-Z\d]+)(\.)([a-z]{2,5})?)$/",$data['email']) && filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            
            return $data;
        }
        return false;
    }
}