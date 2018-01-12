<?php
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 17/3/23
 * Time: 上午12:41
 */
namespace App\Controller;

use App\Model\Articles;
use QL\QueryList;

class HomeController extends BaseController {

    public function home(){
        //self::first();
        //$quote = new Quote();
        //$quote->addList('C#');

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


    public function pull()
    {

        header('content-type:text/html;charset=utf-8');

        $url  = 'http://www.yxdown.com/news/';
        $html = file_get_contents($url);

        //  echo $html;die;
        if (preg_match_all('/<div class="new_zixun" id="lazyImage">([\s\S]*)<div id="morebox">/m', $html, $matches) === false) {
            return false;
        }

        $html = $matches[1][0];


        return \View::make('pull')->with('html',$html);

    }


    public function page() {
//       $data = QueryList::Query('http://www.duowan.com/news/',[
//           'content' => ['.day-item','html','',function($content){
//                $doc = \phpQuery::newDocumentHTML($content);
//               $a = pq($doc)->find('a');
//               foreach ($a as $item){
//                   $href = 'http://www.duowan.com'.pq($item)->attr('href');
//                   pq($item)->attr('href',$href);
//               }
//               return $doc->htmlOuter();
//        }]
//       ])->data;

               $data = QueryList::getInstance()->get('http://www.duowan.com/news/')->rules([
                   'title' => ['.day-item .item-fr > a > h2','text'] ,
                   'content' => ['.day-item .item-fr > a > p','text'] ,
                   'img' => ['.day-item .img-wrap > img','data-src']
               ])->query()->getData();

       // $text = $ql->find('.day-item')->children('img')->attr('src');

       // var_dump($text);
  //      $page = $_GET['p']?:1;
//        $url = 'http://www.vgtime.com/s/steam/';
//        $data = QueryList::getInstance()->get($url)->rules([
//            'content' => ['.table_cell game_cell','html'],
//            'img' => ['.table_cell game_cell .img_box','html']
//        ])->query()->getData();



//        $page = $_GET['p']?:1;
//        $data = QueryList::Query('http://store.steampowered.com/search/?specials=1&page='.$page,[
//           'content' => ['.responsive_search_name_combined','html'],
//            'img' => ['.search_capsule','html']
//       ])->data;



       return \View::make('page')->with('data',$data->all());
        // exit;
    }

}