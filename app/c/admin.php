<?php
class admin extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/admin_m');	
  }
  
  function index()
  {
  	redirect(BASE.'admin/admin_list','','',0);    
  }

  function admin_list(){
    
  	$this->display('v/admin/admin_list');
  }


}