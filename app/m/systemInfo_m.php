<?php
class systemInfo_m extends m {
  public $table_User;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_User = array('Username','Password','Staffs_Sid');
  }

  

 }