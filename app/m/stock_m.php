<?php
class stock_m extends m {
  public $table_Stocks;
  function __construct()
  {
    global $app_id;
    parent::__construct();
    
    $this->table_Stocks = array('Stocks_Wid','Stocks_Iname','Stockamount','Stockarea','Instocktime');
  }

  

 }