<?php
class staff extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/staff_m');	
  }
  
  function index()
  {
  	redirect(BASE.'staff/category_list','','',0);    
  }

  //员工类别列表
  function category_list(){
    $res = $this->m->category_getAll();
    $this->display('v/staff/category_list',array('res'=>$res));
  }

  //添加员工类别
  function category_add(){
    if(isset($_POST['category_add'])){
      $conf = array('SCid'=>'required','SType'=>'required');
      $err = validate($conf);
      if ( $err === TRUE) {
        if($this->m->category_getBySCid($_POST['SCid'])){ //防止重复添加
          $this->msg = '此员工类型的ID已存在';
        }else{
          $this->m->category_add();
          $this->msg = '添加成功';
        }
      }else{
        $this->err = $err;
      }
    }
    $this->display('v/staff/category_add');
  }

  //员工类别修改
  function category_edit(){
    if(isset($_POST['category_edit'])){
      if(!empty($_POST['SCid']) && !empty($_POST['SType']) ){
        $this->m->table = 'Staff_Category';
        $this->m->key = 'SCid';
        $up = $this->m->update(seg(4));
        $this->msg = $up?'修改成功':'修改失败';
      }else{
        $this->msg = '字段不能为空';
      }
    }

    $res = $this->m->category_getBySCid(seg(4));
    $this->display('v/staff/category_edit',array('category'=>$res[0]));
  }

  //员工列表
  function staff_list(){
    $res = $this->m->staff_getAll();
    $this->display('v/staff/staff_list',array('res'=>$res));
  }

  //添加员工
  function staff_add(){
    if(isset($_POST['staff_add'])){
      $conf = array('Sname'=>'required','SCid'=>'required');
      $err = validate($conf);
      if( $err === TRUE ){
          if($this->m->staff_add()){
              $this->msg = '添加成功';
          }else{
              $this->msg = '添加失败';
          }
      }else{
          $this->err = $err;
      }
    }

    $this->display('v/staff/staff_add');
  }

  function staff_edit(){
    $this->m->table = 'Staffs';
    $this->m->key = 'Sid';
    $this->m->fields = array('Sid','Sname','SCid','Sphone');
    if(isset($_POST['staff_edit'])){
      $conf = array('Sname'=>'required','SCid'=>'required','Sphone'=>'required');
      $err = validate($conf);
      if ( $err !== TRUE ) {
        $this->err = $err;
      }
      $up = $this->m->update(seg(4));
      $this->msg = $up?'修改成功':'修改失败';
    }

    $res = $this->m->get_one(seg(4));
    $this->display('v/staff/staff_edit',array('res'=>$res));
  }


}