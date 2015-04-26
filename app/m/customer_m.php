<?php
class customer_m extends m {
  public $table_Customers;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Customers = array('Cname','Ccontact','Caddress','Cpostcode','Cphone','Cbnak','Caccount');

  }

  public function customer_add(){
  	if(!$param)$param = $_POST;
    $this->table = 'Customers';
    $this->fields = $this->table_Customers;
    return $this->add($param);
  }

  public function customer_getAll(){
  	$res = $this->db->query("select * from Customers order by Cid asc");
  	return $res;
  }

  public function customer_getByCid($Cid){
  	$res = $this->db->query("select * from Customers where Cid = $Cid");
  	return $res;
  }


}
