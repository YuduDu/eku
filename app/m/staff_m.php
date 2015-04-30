<?php
class staff_m extends m {
  public $table_Staff_Category;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Staff_Category = array('SCid','SType');
    $this->table_Staffs = array('Sname','SCid','Sphone');
    $this->fields = $this->table_Staff_Category;
  }
   
  function category_add($param=false) {
    if(!$param)$param = $_POST;
    $this->table = 'Staff_Category';
    $this->fields = $this->table_Staff_Category;
    return $this->add($param);
  }

  function category_getBySCid($scid){
      $res = $this->db->query("select * from Staff_Category where SCid = $scid");
      return $res;
  }

  function category_getAll(){
      $res = $this->db->query("select * from Staff_Category order by SCid asc");
      return $res;
  }



  function staff_add($param=false){
    if(!$param)$param = $_POST;
    $this->table = 'Staffs';
    $this->fields = $this->table_Staffs;
    return $this->add($param);
  }

  function staff_getAll(){
    $res = $this->db->query("select * from Staffs order by Sid asc");
    return $res;
  }

}
