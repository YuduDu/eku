<?php
class item extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/item_m');	
  }
  
  function index()
  {
  	redirect(BASE.'item/item_list','','',0);    
  }

  //物品大类列表
  function item_list(){
    //$res = $this->m->category_getAll();
    $this->display('v/item/item_list',array('res'=>array()));
  }

  function item_add(){

    $this->display('v/item/item_add');
  }
  

}