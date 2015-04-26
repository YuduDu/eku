<?php
class customer extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/customer_m');
  }
  
  function index()
  {
  	redirect(BASE.'customer/customer_list','','',0);    
  }

  function customer_list(){
    $res = $this->m->customer_getAll();
  	$this->display('v/customer/list',array('res'=>$res));
  }

  function add(){
    $this->addParams = array(
      'submitName'=>'customer_add', //提交按钮
      'required'=>array('Cname','Ccontact','Caddress','Cpostcode','Cphone'),  //必填字段
      'addCondition'=>false, //排重条件
      'addConditionMsg'=>'请勿重复添加',  //出现重复时，给出提示文字
      'addExcute'=>array('m'=>$this->m,'method'=>'customer_add'),  //执行添加
      'view'=>'v/customer/customer_add'  //视图
    );
    $this->actionAdd();
  }

  function customer_detail(){
    $customer = $this->m->customer_getByCid(seg(3));
    $this->display('v/customer/customer_detail',array('customer'=>$customer[0]));
  }

}