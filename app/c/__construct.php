<?php
load('lib/utility',false);
class base extends c{
  public $menu;
  public $err;
  public $msg;
  function __construct()
  {
    global $db_config;
    
    if(!isset($db_config)){
      // Normal Install Process
      $this->install();
      exit;
    }
     
    if(!load('m/app')->is_install()){
      $this->sae_install();
      exit;
    }

    $this->err = array();
    $this->msg = '';

    $this->menu = array(
          'dashboard'=>'Dashboard',
          'stock'=>'库存单管理',
          'category'=>'物品类管理',
          'supplier'=>'供应商管理',
          'customer'=>'客户管理',
          'warehouse'=>'仓库管理',
          'system'=>'系统信息',
          'staff'=>'员工管理',
          'admin'=>'系统管理',
          'logout'=>'注销'
   );

  $this->tabCell = array(
          'dashboard'=>array(
              'notice'=>'库存通知','add'=>'添加货物','out'=>'出库','inner_trasition'=>'内部流转'),
          'stock'=>array(
              'dashboard'=>'dashboard','addList'=>'入库数据','outList'=>'出库数据','inner_trasition'=>'内部流转'),
          'category'=>array(
              'list'=>'物品类别数据','detailList'=>'具体物品列表数据','collect'=>'物品统计'),
          'supplier'=>array(
              'supplier_list'=>'供应商列表','add'=>'添加供应商','detail'=>'供应商详情','edit'=>'修改供应商详情'),
          'customer'=>array(
              'list'=>'客户列表','add'=>'添加客户','detail'=>'客户详情','edit'=>'修改客户信息'),
          'warehouse'=>array(
              'list'=>'仓储列表'),
          'system'=>array('info'=>'系统信息','account'=>'修改密码'),
          'staff'=>array(
              'category_list'=>'员工类别列表','category_add'=>'添加员工类别','staff_list'=>'员工列表','staff_add'=>'添加员工'),
          'admin'=>array('list'=>'用户列表'),
          'logout'=>'注销'
  );
    
  }
  
  function check()
  {
    $this->u = load('m/user_m')->check(); 
    if(!$this->u['id']){
      $this->login();
    }
  }
  
  function loadapp()
  {
    
    global $app_id;
    $app_id = 1;
    return 1;
  }
  
  function display($view,$param = array())
  {
    $param['al_content'] = view($view,$param,TRUE);
    $param['u'] = $this->u;
    $param['menu']  = $this->menu;
    $param['tabCell'] = $this->tabCell;
    $param['err'] = $this->err;
    $param['msg'] = $this->msg;
    header("Content-type: text/html; charset=utf-8");
    view('v/layout/template',$param);
  }
  
  
  function excel($view,$param = array())
  {
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=test_data.xls");
    $param['al_content'] = view($view,$param,TRUE);
    view('v/excel'.$temp,$param);
  }
  
  function login()
  {
    $rtu = isset($_GET['rtu'])?$_GET['rtu']:BASE;
    $conf = array('username'=>'required','password'=>'required');
    $err = validate($conf);
    if (is_array($err)) {
      //$err['info'] = $this->m->login_err; 
      $param['err'] = $err;
      $param['page_title'] = $param['meta_keywords'] = $param['meta_description'] = '登录';
      //$this->display('v/user/login',$param); 
      //if(browser() == 'html4')view('v/user/login_ie',$param);
      view('v/store/login',$param);  
      exit;
    }
    
    if( $this->m->login( $_POST['username'] , $_POST['password'] )){
      redirect($rtu,'登录成功！');
      exit;
    }
    
    redirect(BASE.'?rtu='.$rtu,$this->m->login_err);
  }
  

  private function install()
  {
    global $db_config;
    if(is_array($db_config))redirect("/");
    $param['writable'] = file_put_contents(APP.'writable.tmp','test');
    
    if(isset($_POST['db_type'])){
      $db_type = $_POST['db_type'] == 'sqlite'?'sqlite':'mysql';
      $_POST['default_db'] = $db_type=='sqlite'?rand(100000,999999).'.sqlite':$_POST['default_db'];
 //     $cname = 'db_'.$db_type;
      $db = new db($_POST);
      $sql = file_get_contents(APP.$db_type.'_ins.sql');
      $db->muti_query($sql);
      $base_dir = rtrim($_POST['base_dir'],'/').'/';
      $seed = randstr();
      file_put_contents(APP.'config_user.php','<?
define(\'BASE\',\'?/\');
define(\'SEED\',\''.$seed.'\');
$db_config = array(
  \'host\'      =>\''.$_POST['host'].'\', 
  \'user\'      =>\''.$_POST['user'].'\',  
  \'password\'  =>\''.$_POST['password'].'\', 
  \'db_type\'   =>\''.$_POST['db_type'].'\',
  \'default_db\'=>\''.$_POST['default_db'].'\'
);');
      redirect($_POST['base_dir'],'安装成功','用户名 admin@b24.cn 密码 admin','8');
    }
    else {
      header("Content-type: text/html; charset=utf-8");
      $base = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
      view("v/home/install",$param);
    }
  }

  private function sae_install()
  {
    global $db_config,$db;
    if(load('m/app')->is_install())redirect("/");
    $sql = file_get_contents(APP.'mysql_ins.sql');
    $db->muti_query($sql);
    header("Content-type: text/html; charset=utf-8");
    view("v/home/sae_install");
  }
}
