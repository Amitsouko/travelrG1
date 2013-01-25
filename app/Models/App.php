<?php
class App extends Prefab{
  
  function __construct(){
      
  }
  function locationDetails(){
    //return F3::get('dB')->exec('select * from location limit 1');
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    return $location->load();
  }
  
  function locationPictures($idLocation){
    //F3::get('dB')->exec('select * from pictures where idLocation='.$idLocation);
    $pictures=new DB\SQL\Mapper(F3::get('dB'),'pictures');
    return $pictures->find(array('idLocation=?',$idLocation));
  }
  
  function next($id){  
    return F3::get('dB')->exec("select id, title from location where id =(select min(id) from location where id > ".$id.")");
  }
  
  function prev($id){
    return F3::get('dB')->exec("select id, title from location where id =(select max(id) from location where id < ".$id.")");
  }
  

  function __destruct(){

  }
}
?>