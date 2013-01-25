<?php
class App_controller{
 
 function __construct(){
  
 }
 
 function home(){
    $App=new App();
    $location=$App->locationDetails();
    F3::set('location',$location);
    
    $pictures=$App->locationPictures($location->id);
    $json=Views::instance()->toJson($pictures,array('image'=>'src'));
    F3::set('pictures',$json);
    
    //F3::set('location',App::instance()->locationDetails(););
    
    echo Views::instance()->render('travelr.html');
 }
 
  
  function doc(){
    echo Views::instance()->render('userref.html');
  }
 
 function __destruct(){

 } 
}
?>