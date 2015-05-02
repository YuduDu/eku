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
    $this->m->table = 'Customers';
    $this->fields = array('Cid','Cname','Ccontact','Caddress','Cpostcode','Cphone','Cbank','Caccount');
    
    if(seg(3) != 's'){
      $page_cur = seg(4)?seg(4):1;
      $res = $this->m->get_many('',$page_cur,10);
      $tot = $this->m->count();
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'customer/customer_list/p/');
    }else{
      $page_cur = seg(6)?seg(6):1;
      $where = 'AND Cname like "%'.urldecode(strip_tags(trim(seg(4)))).'%"';
      $res = $this->m->get_many($where,$page_cur,10);
      $tot = $this->m->count($where);
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'customer/customer_list/s/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
    }

    $this->display('v/customer/list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
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
    $customer = $this->m->customer_getByCid(seg(4));
    $customer_order = $this->m->customer_order_statistics_getByCid(seg(4));
    $this->display('v/customer/customer_detail',array('customer'=>$customer[0],'customer_order'=>$customer_order));
  }

  function customer_edit(){
    $this->m->table = 'Customers';
    $this->m->key = 'Cid';
    $this->m->fields = array('Cname','Ccontact','Caddress','Cpostcode','Cphone','Cbank','Caccount');
    if(isset($_POST['customer_edit'])){
      $conf = array('Cname'=>'required','Ccontact'=>'required','Caddress'=>'required','Cpostcode'=>'required','Cphone'=>'required','Cbank'=>'required','Caccount'=>'required');
      $err = validate($conf);
      if ( $err !== TRUE ) {
        $this->err = $err;
      }
      $up = $this->m->update(seg(4));
      $this->msg = $up?'修改成功':'修改失败';
    }

    $res = $this->m->get_one(seg(4));
    $this->display('v/customer/customer_edit',array('res'=>$res));
  }

}