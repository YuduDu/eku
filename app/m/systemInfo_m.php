<?php
class systemInfo_m extends m {
  public $table_User;
  function __construct()
  {
    global $app_id;
    parent::__construct();

    $this->table = 'User';
    $this->fields = array('Username','Password','Staffs_Sid');
  }


  function user_get($username){
  	$res = $this->db->query("select * from User where Username = '".$username."'");
  	return $res;
  }
  


 }