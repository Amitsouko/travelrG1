<?php
class App extends Prefab{
  
  function __construct(){
      
  }
  function locationDetails(){
    //return F3::get('dB')->exec('select * from location limit 1');
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    return $location->load();
      
  }
  

  function __destruct(){

  }
}
?>