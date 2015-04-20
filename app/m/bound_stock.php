<?php
class bound_stock extends m {
  function __construct()
  {
    global $app_id;
    parent::__construct();
  }
   
  function Inbound($param) {
    $this->table = 'Inbound';
    $this->fields = array('CreateTime','Approver_id','Suppliers_Sid','Deliverer');
    $this->add($param);
    var_dump($Inbound_id);

    //$this->db->query("delete from bug_trace where bugid in (select id from bug where app_id = $id)");
    //$this->db->query("delete from bug where app_id = $id");
  }
}
