<?php
class customer_m extends m {
  public $table_Customers;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Customers = array('Cname','Ccontact','Caddress','Cpostcode','Cphone','Cbnak','Caccount');

  }

}
