<?php
// 所有配置内容都可以在这个文件维护
error_reporting(E_ERROR);

// 配置url路由
$route_config = array(
  '/login/'=>'/user/login/',
  '/reg/'=>'/user/reg/',
  '/logout/'=>'/user/logout/',
);

// if(defined( 'SAE_MYSQL_HOST_M')){
//   define('BASE','/');
//   $db_config = array(
//     'host'=>'localhsot', //SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,
//     'user'=>'root', //SAE_MYSQL_USER,
//     'password'=>'leokuan', //SAE_MYSQL_PASS,
//     'default_db'=>'eku', //SAE_MYSQL_DB
//   );  
// }

if(file_exists(APP.'config_user.php')) require(APP.'config_user.php');
