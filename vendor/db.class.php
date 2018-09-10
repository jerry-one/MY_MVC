<?php
/**
 * Created by PhpStorm.
 * User: 半斤八两
 * Date: 2018/8/30 0030
 * Time: 11:52
 */


class db{

    private static $link,$res;

    /**
     * 连接数据库
     * db constructor.
     * @param $config
     */
    public function __construct($config)
    {
//        var_dump($config);exit;
        self::$link=mysqli_connect(
            $config['dns'],
            $config['username'],
            $config['password'],
            $config['database']
        );

//        var_dump($link);
    }


    /**
     *执行语句
     * @param $sql
     * @return array|null
     */
    public function query($sql){
        self::$res = mysqli_query(self::$link,$sql);

        return $this;
    }


    public function fetchAll(){
        return mysqli_fetch_all(self::$res,MYSQLI_ASSOC);
    }
    public function fetchOne(){
        return mysqli_fetch_array(self::$res,MYSQLI_ASSOC);
    }

    /*
     *  insert into js values ('','123');
     * */
    /**
     * 插入数据
     * @param $tableName
     * @param array $array
     */
    public function insert($tableName,$array=array()){

        $v='(';
        foreach ($array as $key => $value) {
            //判断是不是字符串
            if(is_string($value)){
                $value="'".$value."'";
            }
            if(empty($value)){
                $value.= 'null';
            }
            $v .= $value.",";
        }
        $v=rtrim($v,',');
        $v.=')';

        $sql = 'insert into '.$tableName.' values '.$v;

        $this->query($sql);

    }


    /**
     * 修改数据
     * @param $tableName
     * @param array $array
     * @param string $id
     */
    public function update($tableName,$array=array(),$id=''){

        foreach ( $array as $key =>$value) {
            //判断是不是字符串
            if(is_string($value)){
                $value="'".$value."'";
            }
            $v.=$key.'='.$value.',';
        }
        $v=rtrim($v,',');

        $sql = 'update '.$tableName.' set '.$v.' where '.$id;

        $this->query($sql);
    }


    /**
     * 删除数据
     * @param $tableName
     * @param $id
     */
    public function delete($tableName,$id){

        $sql = 'delete from '.$tableName.' where '.$id;

        $this->query($sql);

    }






}




?>