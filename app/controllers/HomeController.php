<?php
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 17/3/23
 * Time: 上午12:41
 */

class HomeController extends BaseController {

    public function home(){
        //self::first();
        //$quote = new Quote();
        //$quote->addList('C#');
        try {
            $article = Articles::all();

            var_dump($article);
        }catch (Exception $e){
            var_dump($e->getMessage());
        }

//
//        $connection = mysqli_connect("localhost","root","123");
//        if (!$connection) {
//            die('Could not connect: ' . mysqli_error());
//        }
//
//        mysqli_set_charset($connection,"UTF8");
//
//        mysqli_select_db($connection,"mffc");
//
//        $result = mysqli_query($connection,"SELECT * FROM 'articles'");
//
//        var_dump($result);die;
//        if ($row = mysqli_fetch_array($result)) {
//            var_dump( $row);
//        }
//
//        mysqli_close($connection);


    }

}