<?php
/**
 * Created by PhpStorm.
 * User: Mars
 * Date: 2018/1/8
 * Time: 16:23
 */
?>
<?php echo $html;?>
<div id="morebox"></div>
<a href="javascript:;" id="viewMore" onclick="viewMore();return false;"><span>加载更多</span></a>
<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script type="text/javascript">

    window.lastid = 350779;

    function GetDateString(datejson){

        var reg = /(\d+)/;

        if(reg.test(datejson)){

            var times = RegExp.$1;

            var date = new Date(parseInt( times));

            return (date.getMonth()+1 )+'/'+(date.getDate()+1)+' '+ date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();

        }
    }

    function viewMoreCallback(data) {
        var frag = document.createDocumentFragment();

        for (var i = 0; i < data.data.length; i++) {
            var ent = data.data[i];

            window.lastid = ent.ArticleID;

            var url = 'http://yxdown.com/'+ent.path + ent.prefix + ent.ArticleID + '.html';

            var div = document.createElement("div");
            div.className = "div_zixun newstype"+ent.ArticleType;

            var htmlarray = [];
            htmlarray.push('<span class="newstypeicon"></span>');
            htmlarray.push('<h2><a target="_blank" href="' + url + '">' + ent.title + '</a></h2>');

            htmlarray.push('<p class="pic_img">');

            htmlarray.push('<a href="' + url + '" target="_blank">');
            htmlarray.push('<img width="500" height="220" src="' + ent.image500 + '" />');
            htmlarray.push('</a>');
            htmlarray.push('</p>');

            if (ent.jianjie2.length>96) {
                htmlarray.push('<p class="txt_zixun">' + ent.jianjie2.substr(0,96) + '...</p>');
            }else {
                htmlarray.push('<p class="txt_zixun">' + ent.jianjie2 + '</p>');
            }

            htmlarray.push('<div class="bottom_p">');
            htmlarray.push('<div class="bpleft"><span>' + ent.writer + '</span><em></em><span>' + GetDateString(ent.adddate) + '</span></div>');
            htmlarray.push('<div class="bpright">');
            htmlarray.push('<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare" data="{url: \'http://www.yxdown.com' + url + '\', text: \'' + ent.title + '\', pic: \'' + ent.image500 + '\'}">');

            htmlarray.push('<span class="bds_more">更多</span>');
            htmlarray.push('</div>');
            htmlarray.push('<em></em>');
            htmlarray.push('<span>');

            if (ent.comNum > 0) {
                htmlarray.push('<a href="'+url+'#ANew" target="_blank">评论<font>('+ ent.comNum+')</font></a>');
            }else {
                htmlarray.push('<a href="'+url+'#ANew" target="_blank">评论<font></font></a>');

            }

            htmlarray.push('</span>');
            htmlarray.push('</div>');
            htmlarray.push('</div>');


            var html = htmlarray.join('');

            div.innerHTML = html;


            frag.appendChild(div);

        }



        document.getElementById('morebox').appendChild(frag);


        if(bdShare)
        {
            bdShare.fn.init();
        }

    }

    function viewMore() {
        var s = document.createElement("script");
        s.src = "http://dy.www.yxdown.com/news/indexmore.json?callback=viewMoreCallback&previd=" + window.lastid;

        document.body.appendChild(s);
    }

    $(function(){
        $('a').on('click',function(){
            $(this).attr('href','http://www.yxdown.com'+$(this).attr('href'));

        });
    });

</script>

