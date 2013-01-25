<?php
class App_controller{
 
 function __construct(){
  
 }
 
 function home(){
    $App=new App();
    $location=$App->locationDetails();
    F3::set('location',$location);
    
    
    //F3::set('location',App::instance()->locationDetails(););
    
    echo Views::instance()->render('travelr.html');
 }
 
 function travel(){
     $App=new App();
     $title=$App->getTravel();
     F3::set('title',$title);

     echo Views::instance()->render('travelr.html');
  }
  
  function doc(){
    echo Views::instance()->render('userref.html');
  }
 
 function __destruct(){

 } 
}
?>