<?php
class stock extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/stock_m');	
  }
  
  function index()
  {
  	redirect(BASE.'stock/dashboard','','',0);    
  }

  function dashboard(){
  	$this->display('v/stock/dashboard');
  }


}