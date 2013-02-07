<?php
class Admin_controller{

  function __construct()
  {
    
  }
  
  function dashboard(){
    $location=Admin::instance()->getAllLocation();
    F3::set('location',$location);
    echo Views::instance()->render('admin/travels.html');
  }
  
  function create(){
    switch(F3::get('VERB')){
      case 'GET':
        echo Views::instance()->render('admin/travel.html');
      break;
      case 'POST':
      
      break;
    }
  }
  
  function edit(){
    switch(F3::get('VERB')){
      case 'GET':
      
      break;
      case 'POST':
      
      break;
    }
  }
  
}
?>