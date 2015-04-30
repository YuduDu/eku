<?php
class admin extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/admin_m');	
  }
  
  function index()
  {
  	redirect(BASE.'admin/admin_list','','',0);    
  }

  function admin_list(){
    $res = $this->m->admin_getAll();
  	$this->display('v/admin/admin_list',array('res'=>$res));
  }

  function admin_add(){
    $this->addParams = array(
      'submitName'=>'admin_add', //提交按钮
      'required'=>array('Username','Password','Staffs_Sid'),  //必填字段
      'addCondition'=>false, //排重条件
      'addConditionMsg'=>'请勿重复添加',  //出现重复时，给出提示文字
      'addExcute'=>array('m'=>$this->m,'method'=>'admin_add'),  //执行添加
      'view'=>'v/admin/admin_add'  //视图
    );
    $this->actionAdd();
  }

  function admin_edit(){
    if(isset($_POST['admin_edit'])){
      $p = $_POST;
      $this->m->key = 'Username';
      $p['Username'] = seg(4);
      $up = $this->m->update($p['Username']);
      if($up){
        $this->msg = '修改成功';
      }else{
        $this->msg = '修改失败';
      }
    }
    
    $user = $this->m->admin_getByUsername(seg(4));
    $this->display('v/admin/admin_edit',array('user'=>$user[0]));
  }


  function admin_remove(){
    $this->m->key = 'Username';
    $this->m->del(seg(4));
    redirect('?/admin/admin_list','删除成功','',3);
  }


}