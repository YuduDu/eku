<?php
class warehouse extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/warehouse_m');	
  }
  
  function index()
  {
  	redirect(BASE.'warehouse/warehouse_list','','',0);    
  }

  function warehouse_list(){
    if(seg(3) != 's'){
        $page_cur = seg(4)?seg(4):1;
        $res = $this->m->get_many('',$page_cur,10);
        $tot = $this->m->count();
        $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'warehouse/warehouse_list/p/');
    }else{
        $page_cur = seg(6)?seg(6):1;
        $where = 'AND Admin_id like"%'.urldecode(strip_tags(trim(seg(4)))).'%"';
        $res = $this->m->get_many($where,$page_cur,10);
        $tot = $this->m->count($where);
        $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'warehouse/warehouse_list/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
    }
    
    $this->display('v/warehouse/warehouse_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
  }

  function warehouse_add(){
    $this->addParams = array(
      'submitName'=>'warehouses_add', //提交按钮
      'required'=>array('Admin_id'),  //必填字段
      'addCondition'=>false, //排重条件
      'addConditionMsg'=>'请勿重复添加',  //出现重复时，给出提示文字
      'addExcute'=>array('m'=>$this->m,'method'=>'warehouse_add'),  //执行添加
      'view'=>'v/warehouse/add'  //视图
    );
    $this->actionAdd();
  }

  function edit(){
    $this->m->table = 'Warehouses';
    $this->m->key = 'Wid';
    $this->m->fields = array('Wid','Admin_id');
    if(isset($_POST['warehouses_edit'])){
      $conf = array('Admin_id'=>'required');
      $err = validate($conf);
      if ( $err !== TRUE ) {
        $this->err = $err;
      }
      $up = $this->m->update(seg(4));
      $this->msg = $up?'修改成功':'修改失败';
    }

    $res = $this->m->get_one(seg(4));
    $this->display('v/warehouse/edit',array('res'=>$res));
  }


}