<?php
class Admin extends Prefab{
  
  
  function __construct(){
    F3::set('dB',new DB\SQL('mysql:host='.F3::get('db_host').';port=3306;dbname='.F3::get('db_server'),F3::get('db_user'),F3::get('db_password')));  
  }
  
  function getAllLocation(){
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    return $location->find();
  }
  
  function getLocation($id){
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    return $location->load(array('id=?',$id));
  }
  function getPictures($idLocation){
    $pictures=new DB\SQL\Mapper(F3::get('dB'),'pictures');
    return $pictures->find(array('idLocation=?',$idLocation));
  }
  
  function create(){
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    $location->copyFrom('POST');
    $location->save();
    
    $image=Web::instance()->receive();
    if($image){
      $this->_resize($image[0]);
      $pictures=new DB\SQL\Mapper(F3::get('dB'),'pictures');
      $pictures->src=$image[0];
      $pictures->idLocation=$location->id;
      $pictures->save();
    }
  }
  function edit($id){
    $image=Web::instance()->receive();
    if($image){
        $this->_resize($image[0]);
        $pictures=new DB\SQL\Mapper(F3::get('dB'),'pictures');
        $pictures->src=$image[0];
        $pictures->idLocation=$id;
        $pictures->save();
    }
    $location=new DB\SQL\Mapper(F3::get('dB'),'location');
    $location->load(array('id=?',$id));
    $location->copyFrom('POST');
    $location->update();
    
  }

  protected function _resize($image){
    $img=new Image(F3::get('UPLOADS').$image,true);
    $img->resize(1024,768);
    file_put_contents(F3::get('UPLOADS').$image,$img->dump('jpeg'));
  }
  
  
}
?>