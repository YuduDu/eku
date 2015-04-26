<?php
class supplier_m extends m {
  public $table_Suppliers;
  //public $table_Staffs;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Suppliers = array('Sname','Scontact','Saddress','Spostcode','Sphone','Sbank','Saccount');
    //$this->table_Staffs = array('Sname','SCid','Sphone');

  }
   
  function supplier_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Suppliers';
    $this->fields = $this->table_Suppliers;
    return $this->add($param);
  }

  function supplier_getAll(){
      $res = $this->db->query("select * from Suppliers order by Sid desc");
      return $res;
  }

  function supplier_getBySid($Sid){
      $res = $this->db->query("select * from Suppliers where Sid = $Sid limit 0,1");
      return $res;
  }


}
