<?php
class account extends base{
  function __construct()
  {
  	  parent::__construct();
      $this->m = load('m/admin_m');
      $this->needCheck = true;
  }
  
  function login()
  {
  	
  	//redirect(BASE.'account/login','','',0);    
  }


}