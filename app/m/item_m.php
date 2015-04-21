<?php
class item_m extends m {
  public $table_Items;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table_Items = array('ICname','Spec');

  }

}
