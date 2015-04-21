<?php
class systemInfo extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/systemInfo_m');	
  }
  
  function index()
  {
  	redirect(BASE.'systemInfo/info','','',0);    
  }

  function info(){
  	$this->display('v/systemInfo/info');
  }


}