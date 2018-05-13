<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"themes/fanbao/portal/tuijian.html";i:1525921038;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>饭宝赚</title>
    <link href="/themes/fanbao/public/assets/css/style_fanbao.css" type="text/css" rel="stylesheet">
  </head>
   <body>
    <div id="fbz">

       <!--主体部分开始-->
       

       <div class="main">
          <ul>
             <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): if( count($articles)==0 ) : echo "" ;else: foreach($articles as $key=>$art): ?>
             <li><a href="<?php echo cmf_url('portal/Article/index',array('id'=>$art['id'],'cid'=>$art['category_id'], 'sid' => $key+1)); ?>">
               <!--  <img src="/themes/fanbao/public/assets/images/fanbao/logo1.jpg"> -->
               <?php 
               $url = $art['more']['thumbnail']; 
               ?>
                <img src=" <?php echo cmf_get_image_url($url); ?>"/>
                <h2>
                试玩平台 <?php echo $key+1;                     $keywords = explode(',',$art['post_keywords']);
                ?>
                <!-- <?php if(is_array($keywords) || $keywords instanceof \think\Collection || $keywords instanceof \think\Paginator): if( count($keywords)==0 ) : echo "" ;else: foreach($keywords as $key=>$keyword): if(!empty($keyword)): if($key == 0): ?>
                          <span><?php echo $keyword; ?></span>
                      <?php else: ?>
                          <span class="sp1"><?php echo $keyword; ?></span>
                      <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?> -->
                </h2>
                <p>每单试玩奖励<?php echo $art['post_excerpt']; ?></p>
                <button>去赚钱</button>
             </a></li>
             <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
       </div>
       <!--主体部分结束-->
       <!--底部导航开始-->
       <nav>
          <ul class="clearfix">
             <li>
             <a href="<?php echo cmf_url('/'); ?>">
             <i class="fa fa-gamepad" aria-hidden="true"></i>
             <p>试玩赚钱</p>
             </a>
             </li>
             <li class="active">
             <a href="#">
             <i class="fa fa-star-half-o" aria-hidden="true"></i>
             <p>推荐</p>
             </a>
             </li>
             <li>
             <a href="<?php echo cmf_url('portal/Yuedu/index'); ?>">
             <i class="fa fa-book" aria-hidden="true"></i>
             <p>阅读赚钱</p>
             </a>
             </li>
             <li>
             <a href="<?php echo cmf_url('portal/Fanbaoquan/index'); ?>">
             <i class="fa fa-bookmark-o" aria-hidden="true"></i>
             <p>饭宝券</p>
             </a>
             </li>
          </ul>
       </nav>
       <!--底部导航结束-->
    </div>
    <script src="/themes/fanbao/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/themes/fanbao/public/assets/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
    $(function () {
$('#fan-home-slider').flexslider({
        animation: "slide",
        slideshowSpeed: 3000,
        pauseOnHover: true,
        animationLoop: true,   
        before: function (slider) {
            slider.pause();
            slider.play();
        },
    });
    
$(".flex-prev ,.flex-next").empty();  
}); 



$(function() {
    var index = 0;
    var adtimer;
    var _wrap = $("#container ol"); //
    var len = $("#container ol li").length;
    //len=1;
    if (len > 1) {
        $("#container").hover(function() {
            clearInterval(adtimer);
        },
        function() {
            adtimer = setInterval(function() {

                var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
                var _h = _field.height(); //取得每次滚动高度(多行滚动情况下,此变量不可置于开始处,否则会有间隔时长延时)
                _field.animate({
                    marginTop: -_h + 'px'
                },
                500,
                function() { //通过取负margin值,隐藏第一行
                    _field.css('marginTop', 0).appendTo(_wrap); //隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
                })

            },
            2000);
        }).trigger("mouseleave");
        function showImg(index) {
            var Height = $("#container").height();
            $("#container ol").stop().animate({
                marginTop: -_h + 'px'
            },
            1000);
        }

        $("#container").mouseover(function() {
            $("#container .mouse_direction").css("display", "block");
        });
        $("#container").mouseout(function() {
            $("#container .mouse_direction").css("display", "none");
        });
    }

    $("#container").find(".mouse_top").click(function() {
        var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
        var last = _wrap.find('li:last'); //此变量不可放置于函数起始处,li:last取值是变化的
        //last.prependTo(_wrap);
        var _h = last.height();
        $("#container ol").css('marginTop', -_h + "px");
        last.prependTo(_wrap);
        $("#container ol").animate({
            marginTop: 0
        },
        500,
        function() { //通过取负margin值,隐藏第一行
            //$("#container ol").css('marginTop',0).prependTo(_wrap);//隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
        })
    });
    $("#container").find(".mouse_bottom").click(function() {
        var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
        var _h = _field.height();
        _field.animate({
            marginTop: -_h + 'px'
        },
        500,
        function() { //通过取负margin值,隐藏第一行
            _field.css('marginTop', 0).appendTo(_wrap); //隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
        })
    });
});
    </script>
   </body>
</html>