<?php
class dashboard extends base{
  function __construct()
  {
  		parent::__construct();		
  }
  
  function index()
  {
  	redirect(BASE.'dashboard/notice','','',0);    
  }

  function notice(){
	   $this->display('v/dashboard/index');
  }

  function add(){
      if(isset($_POST['addInBound'])){
        $this->m = load('m/bound_stock');
        $this->m->Inbound($_POST);
      }

      $this->display('v/dashboard/add');
  }

}