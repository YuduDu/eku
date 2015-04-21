<?php
class customer extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/customer_m');	
  }
  
  function index()
  {
  	redirect(BASE.'customer/customer_list','','',0);    
  }

  function customer_list(){
  	$this->display('v/customer/list');
  }


}