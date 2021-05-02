<?php


class Register extends Controller{

    public function __construct(){
        $this->employeeModel=$this->model('Employee');
        $this->professionModel=$this->model('Profession');

        if(authMiddleware()){
            redirect();
        }
    }

    public function index(){ 

        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            if($data = $this->validate($_POST)){
                
                if($employee = $this->employeeModel->create($data)){ 
                    redirect('login?registered=true');
                }
                else{
                    die('Something Went wrong');
                }
            }
            else{
                redirect('register');
            }

        }else{
            $professions = $this->professionModel->all();

            $this->view('auth/register',['professions'=>$professions]);
        }
    }

    public function validate($data){
        
        if(!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['age']) && !empty($data['password']) && !empty($data['profession']) && !empty($data['salary']) && filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            return [
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'age'=>intval($data['age']),
                'email'=>$data['email'],
                'password'=>password_hash($data['password'], PASSWORD_DEFAULT),
                'profession_id'=>intval($data['profession']),
                'salary'=>floatval($data['salary']),
            ];
        }
        
        return false;
    }
}