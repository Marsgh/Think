<?php
namespace App\Controller;
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 17/3/19
 * Time: 下午7:42
 */
class BaseController {

    public function _construct() {

    }

    public function first() {
        $connection = mysqli_connect('localhost','root','123','mffw');
       // mysql_select_db('',$connection);
        $rousce = mysqli_query($connection,'select * from articles');

        if($row = mysqli_fetch_array($rousce)){
            var_dump($row);
        }
        mysqli_close($connection);
    }



}