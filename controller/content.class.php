<?php
/**
 * Created by PhpStorm.
 * User: 半斤八两
 * Date: 2018/9/1 0001
 * Time: 13:05
 */

class content{

    function index(){

        $show_database=$GLOBALS['db']->query('show databases')->fetchAll();
//        var_dump($show_database);exit;

        include 'view/phpneirong/index.html';
    }




}






?>