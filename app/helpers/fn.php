<?php

function redirect($page=''){
  header('Location: /'.$page);
}

function auth(){
  if(isset($_SESSION['employee'], $_SESSION['is_authenticated']) && $_SESSION['is_authenticated'] && !empty($_SESSION['employee'])){
    return $_SESSION['employee'];
  }

  return false;
}

function csrfToken(){
  if(!isset($_POST['token']) || !Token::check($_POST['token'])){
    die('Something Went wrong');
  }

  return true;
}