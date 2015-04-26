<?php
class warehouse_m extends m {
  public $table_Warehouses;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Warehouses = array('Admin_id','Admin_idx');

  }
  

 }