<?php
/**
 * Created by PhpStorm.
 * User: 半斤八两
 * Date: 2018/9/4 0004
 * Time: 11:31
 */

class form{

    //查询数据库
    public function index(){

        $show_database=$GLOBALS['db']->query('show databases')->fetchAll();

        include 'view/phpform/index.html';
    }

    //查询表的数据
    public function getTable(){

        $database=$_GET['database'];//获取数据库
        $GLOBALS['db']->query("use $database");
        $res = $GLOBALS['db']->query("show tables;")->fetchAll();//查询数据表
        $string =json_encode($res);
        $string =str_replace($database,'name',$string);//替换
        $result = json_decode($string,true);
        include 'view/phpform/tableListt.html';
        die;

    }

    public function getFieldIndex(){

        $database=$_GET['database'];//获取数据库
        $table=$_GET['table'];//获取数据表

        include 'view/phpform/fieldIndex.html';

    }

    public function getFieldList(){
        $database=$_GET['database'];
        $table=$_GET['table'];
        //var_dump($table);die;
        $result=$GLOBALS['db']->query("desc $database.$table;")->fetchAll();
        //var_dump($result);die;
        include 'view/phpform/field.html';

    }

    public function getIndexList(){
        $database=$_GET['database'];
        $table=$_GET['table'];
        //var_dump($table);die;
        $result=$GLOBALS['db']->query("desc $database.$table;")->fetchAll();
        //var_dump($result);die;
        include 'view/phpform/indexList.html';

    }



    //查询展示数据表
    public function jionDb(){
        $database=$_GET['database'];
        $GLOBALS['db']->query("use $database");
        $res = $GLOBALS['db']->query("show tables;")->fetchAll();//查询数据表
        $string =json_encode($res);
        $string =str_replace($database,'name',$string);//替换
        include 'view/phpform/jionDb.html';

    }


    //新建表页面
    public function newTable(){
        include 'view/phpform/newTable.html';
    }

    //跳转主页面
    public function home(){
        include 'view/phpform/home.html';
    }
    //跳转SQL页面
    public function sql(){
        include 'view/phpform/sql.html';
    }
    //跳转状态页面
    public function state(){
        include 'view/phpform/state.html';
    }


    //dialog弹框
    public function dialog(){
        include 'public/dialog/index.html';
    }






}






?>