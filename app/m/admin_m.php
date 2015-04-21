<?php
class admin_m extends m {
  public $table_User;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Customers = array('Username','Password');

  }

}
