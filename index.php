<?php

if(empty($_SERVER['PATH_INFO'])){
    $_SERVER['PATH_INFO']='jr/index';
}

$pathInfo=$_SERVER['PATH_INFO'];// 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组

$pathInfo=ltrim($pathInfo,'/');//去除斜线

$action=explode('/',$pathInfo);//分割 a/b 以斜线分割

// $action[0]=ucfirst($action[0]);
// $action[1]=ucfirst($action[1]);
include 'vendor/db.class.php';
include 'common/db.config.php';

$GLOBALS['db']=new db($config['db']);

//$db->query('show tables');

$host = $_SERVER['HTTP_HOST'];
$host = rtrim($host,'/');

define("_PUBLIC_","http://".$host.'/mvc/public/');

//echo _PUBLIC_;


include 'Controller/'.$action[0].'.class.php';//Controller拼接分割出的$action[0]在拼接class.PHP
// @ 不显示异常错误
@call_user_func_array(array($action[0],$action[1]),array('')); //call_user_func_array回调函数 调用a，b





?>