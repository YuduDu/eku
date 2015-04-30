<?php
class dashboard_m extends m {
  public $table_Inbound;
  public $table_Inbound_details;
  public $table_Stocks;
  public $table_Warehouses;
  public $table_Outbound;
  public $table_Outbound_details;
  public $table_Inner_Trasition;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Inbound = array('Approver_id','Suppliers_Sid','Deliverer');
    $this->table_Inbound_details = array('Inbound_id','Inbound_Iname','Amount','Unit_Price','Inbound_Stockid','Warehouse_Wid');
    $this->table_Stocks = array('Stocks_Wid','Stocks_Iname','Stockamount','Stockarea');
    $this->table_Warehouses = array('Admin_id');
    $this->table_Outbound = array('Customer_Cid','Approver_id','Consignee');
    $this->table_Outbound_details = array('Outbound_id','Outbound_Iname','Amount','Unit_price','Warehouse_Wid','Outbound_Stockid');
    $this->table_Inner_Trasition = array('I_T_Wid','Amount','Items_Iname','Operate','Stockid');
  }
   
   /*Inbound操作*/
  function inbound_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Inbound';
    $this->fields = $this->table_Inbound;
    return $this->add($param)?$this->db->insert_id():false;
  }

  function inbound_getAll(){
      $res = $this->db->query("select * from Inbound order by Inbound_id desc");
      return $res;
  }

  function inbound_detail_getAll(){
      $res = $this->db->query("select * from Inbound_details order by Inbound_id desc");
      return $res;
  }

  /*Inbound_details操作*/
  function inbound_detail_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Inbound_details';
    $this->fields = $this->table_Inbound_details;
    return $this->add($param);
  }

  /*Stocks操作*/
  function stock_add($param=false){
    if(!$param)$param = $_POST;
    $this->table = 'Stocks';
    $this->fields = $this->table_Stocks;
    return $this->add($param)?$this->db->insert_id():false;
  }

  /*Warehouses操作*/
  function warehouses_add($param=false){
    if(!$param)$param = $_POST;
    $this->table = 'Warehouses';
    $this->fields = $this->table_Warehouses;
    return $this->add($param)?$this->db->insert_id():false;
  }

  /*Outbound操作*/
  function outbound_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Outbound';
    $this->fields = $this->table_Outbound;
    return $this->add($param);
  }

  /*Outbound_details操作*/
  function outbound_detail_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Outbound_details';
    $this->fields = $this->table_Outbound_details;
    return $this->add($param);
  }

  /*inner_trasition操作*/
  function inner_trasition_add($param=false){
    if(!$param)$param = $_POST;
    $this->table = 'Inner_Trasition';
    $this->fields = $this->table_Inner_Trasition;
    return $this->add($param);
  }



}
