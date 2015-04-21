<?php
class warehouse extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/warehouse_m');	
  }
  
  function index()
  {
  	redirect(BASE.'warehouse/warehouse_list','','',0);    
  }

  function warehouse_list(){
  	$this->display('v/warehouse/warehouse_list');
  }


}