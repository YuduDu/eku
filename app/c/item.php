<?php
class item extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/item_m');
  }
  
  function index()
  {
  	redirect(BASE.'item/item_category_list','','',0);    
  }

  //物品大类列表
  function item_category_list(){
    $res = $this->m->item_Category_getAll();
    $this->display('v/item/item_category_list',array('res'=>$res));
  }

  function item_category_add(){
    if(isset($_POST['item_add'])){
      $conf = array('ICname'=>'required','Spec'=>'required');
      $err = validate($conf);
      if ( $err === TRUE) {
          $this->m->item_Category_add();
          $this->msg = '添加成功';
      }else{
        $this->err = $err;
      }
    }
    $this->display('v/item/item_category_add');
  }

  function item_see(){
    $items = $this->m->item_getByICname(seg(3));
    $this->display('v/item/item_list',array('items'=>$items));
  }
  
  function item_add(){
    $this->addParams = array(
      'submitName'=>'item_add', //提交按钮
      'required'=>array('Iname','ICname','Unit'),  //必填字段
      'addCondition'=>false, //排重条件
      'addConditionMsg'=>'请勿重复添加',  //出现重复时，给出提示文字
      'addExcute'=>array('m'=>$this->m,'method'=>'item_add'),  //执行添加
      'view'=>'v/item/item_add'  //视图
    );
    $this->actionAdd();
  }

}