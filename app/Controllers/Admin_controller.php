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
  
}
?>