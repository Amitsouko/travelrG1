<?php
class Test_controller{

  function __construct()
  {
    
  }
  
  function travel(){
    $units=array(
      array('firstname'=>'','lastname'=>'Pumir','email'=>'fpumir@maraboutee.net','email_check'=>'fpumir@maraboutee.net'),
      array('firstname'=>'Francois','lastname'=>'Pumir','email'=>'fpumir@google.fr','email_check'=>'fpumir@google.fr'),
      array('firstname'=>'Francois','lastname'=>'','email'=>'fpumir@maraboutee.net','email_check'=>'fpumir@maraboutee.net'),
      array('firstname'=>'','lastname'=>'','email'=>'fpumir@maraboutee.net','email_check'=>'fpumir@maraboutee.net'),
      array('firstname'=>'Francois','lastname'=>'Pumir','email'=>'fpumir@maraboutee.n','email_check'=>''),
      array('firstname'=>'Francois','lastname'=>'Pumir','email'=>'fpumir@maraboutee.net','email_check'=>'fpumir@maraboutee.nt'),
      array('firstname'=>'Francois','lastname'=>'Pumir','email'=>'fpumir@maraboute.net','email_check'=>'fpumir@maraboute.net'),
      array('firstname'=>'f','lastname'=>'p','email'=>'fpumir@maraboutee.net','email_check'=>'fpumir@maraboutee.net') 
    );
    $test=new \Test;
    foreach($units as $unit){
      F3::mock('POST /travel',$unit);
      $test->expect(
        !F3::get('errorMsg'),
        'POST : ' .$unit['firstname'].' | '.$unit['lastname'].' | '.$unit['email'].' | '.$unit['email_check'].' => '.F3::stringify(F3::get('errorMsg'))
        );
    }
   F3::set('results',$test->results());
   echo Views::instance()->render('test.html');
  }
  
  
  
  
}
?>