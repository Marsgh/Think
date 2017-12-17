<?php
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 17/4/23
 * Time: 下午3:36
 */
class Quote {


    public static  $map = [];


    public function __construct(){
        self::$map = [
            'php','java','C'
        ];
    }

    public  function addList($v){
        array_push(self::$map,$v);
    }

    public static function getLength(){
        return count(self::$map);
    }



}