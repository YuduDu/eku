<?php
class stock extends base{
  function __construct()
  {
  		parent::__construct();
      $this->m = load('m/stock_m');	
  }
  
  function index()
  {
  	redirect(BASE.'stock/inbound_list','','',0);    
  }

  function inbound_list(){
    $page_cur = seg(4)?seg(4):1;

    $this->m->table = 'Inbound';
    $this->fields = array('Inbound_id','CreateTime','Approver_id','Suppliers_Sid','Deliverer');
    $res = $this->m->get_many('order by CreateTime desc',$page_cur,10);
    $tot = $this->m->count();
    $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inbound_list/p/');
    $this->display('v/stock/inbound_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m));
  }

  function outbound_list(){
    $page_cur = seg(4)?seg(4):1;

    $this->m->table = 'Outbound';
    $this->fields = array('Outbound_id','Customer_Cid','Createtime','Approver_id','Consignee');
    $res = $this->m->get_many('order by CreateTime desc',$page_cur,10);
    $tot = $this->m->count();
    $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/outbound_list/p/');
    $this->display('v/stock/outbound_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m));
  }

  function inner_list(){
    $page_cur = seg(4)?seg(4):1;

    $this->m->table = 'Inner_Trasition';
    $this->fields = array('Transitionid','I_T_Wid','Amount','Items_Iname','Operate','Stockid','Time');
    $res = $this->m->get_many('order by Time desc',$page_cur,10);
    $tot = $this->m->count();
    $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inner_list/p/');
    $this->display('v/stock/inner_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m));
  
  }



}