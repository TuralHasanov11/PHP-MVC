<?php 


class Core{
    protected $currentController='Pages';
    protected $currentMethod='index';
    protected $params=[];

    public function __construct(){
        
        $url=$this->getUrl();

        if(is_array($url) && !empty($url)){

            
            if(!empty($url)){
               
                if(file_exists('../app/controllers/'.ucfirst(reset($url)).'.php')){
                    $this->currentController=ucfirst(reset($url));
                    array_shift($url);
                }
            }
            
            require_once '../app/controllers/'.$this->currentController.'.php';
            $this->currentController= new $this->currentController;
            
            if(!empty($url)){
                
                if(method_exists($this->currentController,reset($url))){
                    
                    $this->currentMethod=reset($url);
                    array_shift($url);
                } 
            }
            
            $this->params=$url?array_values($url):[];
            

            call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
        }
        else{
            require_once '../app/controllers/'.$this->currentController.'.php';
            $this->currentController= new $this->currentController;

            $this->params=$url?array_values($url):[];

            call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
        }
        
    }

    public function getUrl(){
        
        if(isset($_GET['url'])){
            $url=explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
            return $url;
        }

        return;
    }

}