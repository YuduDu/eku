<?php
class supplier extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/supplier_m');	
  } 
  
  function index()
  {
  	redirect(BASE.'supplier/supplier_list','','',0);    
  }

  //供应商列表
  function supplier_list(){
      $this->m->table = 'Suppliers';
      $this->fields = array('Sid','Sname','Scontact','Saddress','Spostcode','Sphone','Sbank','Saccount');
      
      if(seg(3) != 's'){
        $page_cur = seg(4)?seg(4):1;
        $res = $this->m->get_many('',$page_cur,10);
        $tot = $this->m->count();
        $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'supplier/supplier_list/p/');
      }else{
        $page_cur = seg(6)?seg(6):1;
        $where = 'AND Sname like "%'.urldecode(strip_tags(trim(seg(4)))).'%"';
        $res = $this->m->get_many($where,$page_cur,10);
        $tot = $this->m->count($where);
        $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'supplier/supplier_list/s/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
      }
      //$res = $this->m->supplier_getAll();
      //$this->display('v/supplier/supplier_list',array('res'=>$res),true);
      $this->display('v/supplier/supplier_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
  }

  //供应商添加
  function add(){
      if(isset($_POST['supplier_add'])){
      $conf = array('Sname'=>'required','Scontact'=>'required','Saddress'=>'required','Spostcode'=>'required','Sphone'=>'required','Sbank'=>'required','Saccount'=>'required');
      $err = validate($conf);
      if ( $err === TRUE) {
        if($this->m->supplier_add()){
          $this->msg = '添加成功';
        }else{
          $this->msg = '添加失败';
        }
      }else{
        $this->err = $err;
      }
    }
      $this->display('v/supplier/supplier_add');
  }

  function mod_supplier(){
    $this->m->table = 'Suppliers';
    $this->m->key = 'Sid';
    $this->m->fields = array('Sname','Scontact','Saddress','Spostcode','Sphone','Sbank','Saccount');
    if(isset($_POST['supplier_mod'])){
      $conf = array('Sname'=>'required','Scontact'=>'required','Saddress'=>'required','Spostcode'=>'required','Sphone'=>'required','Sbank'=>'required','Saccount'=>'required');
      $err = validate($conf);
      if ( $err !== TRUE ) {
        $this->err = $err;
      }
      $up = $this->m->update(seg(4));
      $this->msg = $up?'修改成功':'修改失败';
    }

    $res = $this->m->get_one(seg(4));
    $this->display('v/supplier/supplier_mod',array('res'=>$res));
  }

  //查看供应商，以及供货数据
  function see_supplier(){
    $sup = $this->m->supplier_getBySid(seg(4));
    $suppliers_order = $this->m->suppliers_order_statistics_getBySid(seg(4));
    $this->display('v/supplier/supplier_see',array('sup'=>$sup[0],'suppliers_order'=>$suppliers_order));
  }


  

}