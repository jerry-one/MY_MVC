<?php
/**
 * Created by PhpStorm.
 * User: 半斤八两
 * Date: 2018/8/31 0031
 * Time: 11:52
 */


class login{

    /**
     * 跳转登录页面
     */
    function index(){
//        echo 'ni hao ';

        if(!isset($_SESSION['pma_username']) or !empty($_SESSION['pma_username'])){
            echo '';
        }


        include 'view/phpmyadmin/login.html';

    }

    /**
     * 执行登录存入session
     */
    public function loginCheck(){

        $user=$_POST['pma_username'];

        $result=$GLOBALS['db']->query('select User from mysql.user where User="'.$user.'" limit 1')->fetchOne();

        if(empty($result)){
            die('此用户不存在!');
        }else{
            $show_database=$GLOBALS['db']->query('show databases')->fetchAll();

           include 'view/phpneirong/index.html';
        }

    }


    //查询表的数据
    public function getTable(){

        $database=$_GET['database'];//获取数据库
        $GLOBALS['db']->query("use $database");
        $res = $GLOBALS['db']->query("show tables;")->fetchAll();//查询数据表
        $string =json_encode($res);
        echo str_replace($database,'name',$string);//替换
        die;

    }






}

?>