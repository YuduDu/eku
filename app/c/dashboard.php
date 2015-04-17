<?php
class dashboard extends base{
  function __construct()
  {
  		parent::__construct();		
  }
  
  function index()
  {
  	$this->display('v/dashboard/index');
    //header("location:?/store/");
  }
}