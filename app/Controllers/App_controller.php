<?php
class App_controller{
 
 function __construct(){
  
 }
 
 function home(){
    $id=F3::get('PARAMS.id');
    #récupération de la location
    $App=new App();
    $location=$App->locationDetails($id);
    F3::set('location',$location);
    
    if(F3::get('AJAX')){
      $ajax['coords']['lat']=$location->lat;
      $ajax['coords']['lng']=$location->lng;
      $pictures=App::instance()->locationPictures($location->id);
      $ajax['pictures']=array_map(function($item){return array('image'=>$item->src);},$pictures);
      echo json_encode($ajax);
      return;
    }
    
    
    $next=$App->next($location->id);
    $prev=$App->prev($location->id);
    

    $p=$prev?$prev[0]['id'].'-'.$prev[0]['title']:'';
    $n=$next?$next[0]['id'].'-'.$next[0]['title']:'';

    F3::set('prev',$p);
    F3::set('next',$n);
    
    echo Views::instance()->render('travelr.html');
 }
 
  
  function doc(){
    echo Views::instance()->render('userref.html');
  }
 
 function __destruct(){

 } 
}
?>