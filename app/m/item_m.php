<?php
class item_m extends m {
  public $table_Items;
  public $table_Item_Category;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Items = array('Iname','ICname','Unit');
    $this->table_Item_Category = array('ICname','Spec');

  }

  function item_Category_getByICname($ICname){
    $res = $this->db->query("select * from Item_Category where ICname = $ICname limit 0,1");
    return $res;
  }

  function item_Category_getAll(){
  	$res = $this->db->query("select * from Item_Category");
  	return $res;
  }

  function item_Category_add(){
  	if(!$param)$param = $_POST;
    $this->table = 'Item_Category';
    $this->fields = $this->table_Item_Category;
    return $this->add($param);
  }

  function item_getByICname($ICname){
  	$res = $this->db->query("select * from Items where ICname = $ICname");
  	return $res;
  }

  function item_add($param=false){
  	if(!$param)$param = $_POST;
    $this->table = 'Items';
    $this->fields = $this->table_Items;
    return $this->add($param);
  }

}
