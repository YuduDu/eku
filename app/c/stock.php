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
    $this->m->table = 'Inbound';
    $this->fields = array('Inbound_id','CreateTime','Approver_id','Suppliers_Sid','Deliverer');
    
    if(seg(3) != 's'){
      $page_cur = seg(4)?seg(4):1;
      $res = $this->m->get_many('order by CreateTime desc',$page_cur,10);
      $tot = $this->m->count();
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inbound_list/p/');
    }else{
      $page_cur = seg(6)?seg(6):1;
      $where = 'AND Deliverer like "%'.urldecode(strip_tags(trim(seg(4)))).'%" order by CreateTime desc';
      $res = $this->m->get_many($where,$page_cur,10);
      $tot = $this->m->count($where);
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inbound_list/s/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
    }

    $this->display('v/stock/inbound_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
  }

  function outbound_list(){
    $this->m->table = 'Outbound';
    $this->fields = array('Outbound_id','Customer_Cid','Createtime','Approver_id','Consignee');
    
    if(seg(3) != 's'){
      $page_cur = seg(4)?seg(4):1;
      $res = $this->m->get_many('order by Createtime desc',$page_cur,10);
      $tot = $this->m->count();
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/outbound_list/p/');
    }else{
      $page_cur = seg(6)?seg(6):1;
      $where = 'AND Consignee like "%'.urldecode(strip_tags(trim(seg(4)))).'%" order by Createtime desc';
      $res = $this->m->get_many($where,$page_cur,10);
      $tot = $this->m->count($where);
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/outbound_list/s/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
    }

    $this->display('v/stock/outbound_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
  }

  function inner_list(){
    $this->m->table = 'Inner_Trasition';
    $this->fields = array('Transitionid','I_T_Wid','Amount','Items_Iname','Operate','Stockid','Time');
    
    if(seg(3) != 's'){
      $page_cur = seg(4)?seg(4):1;
      $res = $this->m->get_many('order by Time desc',$page_cur,10);
      $tot = $this->m->count();
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inner_list/p/');
    }else{
      $page_cur = seg(6)?seg(6):1;
      $where = 'AND Items_Iname like "%'.urldecode(strip_tags(trim(seg(4)))).'%" order by Time desc';
      $res = $this->m->get_many($where,$page_cur,10);
      $tot = $this->m->count($where);
      $pagination = pagination($tot ,  $page_cur, 10 ,BASE.'stock/inner_list/s/'.urlencode(strip_tags(trim(seg(4)))).'/p/');
    }

    $this->display('v/stock/inner_list',array('res'=>$res,'pagination'=>$pagination,'m'=>$this->m),true);
  
  }



}