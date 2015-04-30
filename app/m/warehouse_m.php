<?php
class warehouse_m extends m {

  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table = 'Warehouses';
    $this->fields = array('Admin_id');
  }

  function warehouse_add(){
  	if(!$param)$param = $_POST;
    return $this->add($param);
  }

 }