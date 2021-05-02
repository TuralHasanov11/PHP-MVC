<?php


class Employees extends Controller{
    public function __construct(){
        $this->employeeModel=$this->model('Employee');
        $this->professionModel=$this->model('Profession');

        if(!adminMiddleware()){
            redirect();
        }
    }

    public function index(){
        
        $employees= $this->employeeModel->paginate(10); 

        $this->view('employees/index',$employees);
    }

    public function create(){
        
        $professions = $this->professionModel->all();

        $this->view('employees/create',['professions'=>$professions]);
    }

    public function show($id){
        
        $employee=$this->employeeModel->find($id);
        $professions = $this->professionModel->all();
      
        $this->view('employees/show',['employee'=>$employee, 'professions'=>$professions]);
    }


    public function update($id){
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            

            if($data = $this->validate($_POST)){
               
                if($this->employeeModel->update(intval($id),$data)){ 
                    
                    redirect('employees/show/'.$id);
                }
                else{
                    die('Uğursuz Əməliyyat');
                }
            }
            else{
                redirect('employees/show/'.$id);
            }
        }
    }

    public function block($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();
 
            if($this->employeeModel->blockToggle(intval($id))){ 
                redirect('employees/show/'.$id);
            }
            else{
                die('Something Went wrong');
            }
        }
    }

    public function unblock($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();
 
            if($this->employeeModel->blockToggle(intval($id),false)){ 
                redirect('employees/show/'.$id);
            }
            else{
                die('Something Went wrong');
            }
        }
    }

    public function destroy($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();
 
            if($this->employeeModel->delete(intval($id))){ 
                redirect('employees');
            }
            else{
                die('Something Went wrong');
            }
        }
    }

    public function validate($data){
        if(!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['age']) && !empty($data['profession']) && !empty($data['salary']) && filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
            return [
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'age'=>intval($data['age']),
                'email'=>$data['email'],
                'admin'=>isset($data['admin'])?1:0,
                'profession_id'=>intval($data['profession']),
                'salary'=>floatval($data['salary']),
            ];
        }
        
        return false;
    }
}