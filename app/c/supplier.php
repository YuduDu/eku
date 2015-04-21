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
      $res = $this->m->supplier_getAll();
      $this->display('v/supplier/supplier_list',array('res'=>$res));
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
      $this->display('v/supplier/supplier_mod');
  }

  //查看供应商，以及供货数据
  function see_supplier(){
      $sup = $this->m->supplier_getBySid(seg(4));

      $this->display('v/supplier/supplier_see',array('sup'=>$sup[0]));
  }


  

}