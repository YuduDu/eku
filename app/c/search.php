<?php

class search extends base{

	function __construct(){
  		parent::__construct();
  	}

  	function key(){
  		redirect(BASE.$_POST['uri'].'/s/'.urlencode(strip_tags(trim($_POST['key']))),'','',0);
  	}

}

