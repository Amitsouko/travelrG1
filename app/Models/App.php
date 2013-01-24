<?php
class App extends Prefab{
  
  function __construct(){
      F3::set('dB',new DB\SQL(
        'mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),
        F3::get('db_user'),
        F3::get('db_pw')));
  }
  function locationDetails(){
    //return F3::get('dB')->exec('select * from location limit 1');
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    return $location->load(array(),array());
  }
  

  function __destruct(){

  }
}
?>