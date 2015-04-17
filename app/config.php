<?php
// 所有配置内容都可以在这个文件维护
error_reporting(E_ERROR);

// 配置url路由
$route_config = array(
  '/login/'=>'/user/login/',
  '/reg/'=>'/user/reg/',
  '/logout/'=>'/user/logout/',
);

if(file_exists(APP.'config_user.php')) require(APP.'config_user.php');
