
<?php
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 2018/1/8
 * Time: 17:23
 */

?>
<h3><?=count($data); ?></h3>
<?php
foreach ($data?:[] as $item){
?>

    <div class="item-fl" target="_blank">
        <a href="#" class="img-wrap">
            <img src="<?php echo $item['img'];?>"  alt="<?php echo $item['title'];?>" width="200">
        </a>
    </div>
    <div class="item-fr">
        <a href="#" target="_blank">
            <h2><?php echo $item['title'];?></h2>
            <p class="intro"><?php echo $item['content'];?></p>
        </a>
    </div>

<?php

}

echo '<ul>';
for($i=1;$i<30;$i++) {

    echo '<li><a href="http://local.mffw.com/page?p='.$i.'">'.$i.'</a></li>';
}

echo '</ul>';