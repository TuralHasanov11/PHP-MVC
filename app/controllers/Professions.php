<?php


class Professions extends Controller{
    public function __construct(){
        $this->professionModel=$this->model('Profession');

        if(!adminMiddleware()){
            redirect();
        }
    }

    public function index(){
        
        $professions= $this->professionModel->all(); 

        $this->view('professions/index',['professions'=>$professions]);
    }

    public function create(){
        $this->view('professions/create');
    }

    public function show($id){
        
        $profession = $this->professionModel->find($id);
      
        $this->view('professions/show',['profession'=>$profession]);
    }

    public function store(){
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                       
            if($data = $this->validate($_POST)){
                if($this->professionModel->create($data)){ 
                    redirect('professions');
                }
                else{
                    die('Something Went wrong');
                }
            }
            else{
                redirect('professions/create');
            }
        }
    }

    public function update($id){
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();

            $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            if($data = $this->validate($_POST)){
                
                if($this->professionModel->update(intval($id),$data)){ 
                    
                    redirect('professions/show/'.$id);
                }
                else{
                    die('Something Went wrong');
                }
            }
            else{
                redirect('professions/show/'.$id);
            }
        }
    }

    public function destroy($id){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            csrfToken();
          
            if($this->professionModel->delete(intval($id))){ 
                redirect('professions');
            }
            else{
                die('Something Went wrong');
            }
        }
    }

    public function validate($data){
        if(!isset($data['name']) || empty($data['name'])){
            return $data;
        }
        
        return $data;
    }
}