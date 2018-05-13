<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:32:"themes/fanbao/portal/ydinfo.html";i:1525436712;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>饭宝赚</title>
<link href="/themes/fanbao/public/assets/css/style_fanbao.css" type="text/css" rel="stylesheet">
<link href="/themes/fanbao/public/assets/css/styles_fanbao.css" type="text/css" rel="stylesheet">
</head>
<body class="fbz">
<div id="fbz"> 
  <!--头部开始-->
  <div class="header"> <a href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    <p>平台详情</p>
  </div>
  <!--头部结束--> 
  <!--主体部分开始-->
  <?php 
     $url = $article['more']['thumbnail']; 
   ?>
  <div class="yd1"> <img src="<?php echo cmf_get_image_url($url); ?>">
    <h2><?php echo $article['post_title']; ?></h2>
    <p>最高领200元现金</p>
    <button class="start" data-url="<?php echo strip_tags($article['post_source']) ?>">立即下载</button>
  </div>
  <div class="yd2">
  <h2>平台介绍</h2>
  <p>在这里不仅可以看海量精彩资讯，还可以获得丰厚的现金和狐币奖励</p>
  <div class="yd2_b">
  <div class="clearfix yd2_bb">

       <div class="baguetteBoxOne gallery">
           <?php if(is_array($photos_1) || $photos_1 instanceof \think\Collection || $photos_1 instanceof \think\Paginator): if( count($photos_1)==0 ) : echo "" ;else: foreach($photos_1 as $key=>$vo): ?>
                <a href="<?php echo cmf_get_image_url($vo['url']); ?>"><img  src="<?php echo cmf_get_image_url($vo['url']); ?>"></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

  </div>
  </div>
  </div>
  <div class="yd2 yd3">
  <h2>新手赚钱</h2>
  <p>1、点击注册并下载APP，登录后可随机领取1元+现金红包<br/>
  2、绑定微信可获得200狐币</p>
  <div class="yd3_b">
  <div class="clearfix yd3_ba">
    <div class="baguetteBoxOne gallery">
           <?php if(is_array($photos_2) || $photos_2 instanceof \think\Collection || $photos_2 instanceof \think\Paginator): if( count($photos_2)==0 ) : echo "" ;else: foreach($photos_2 as $key=>$vo): ?>
                <a href="<?php echo cmf_get_image_url($vo['url']); ?>"><img  src="<?php echo cmf_get_image_url($vo['url']); ?>"></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
     </div>

  </div>
  </div>
  </div>
  <div class="yd2 yd3">
  <h2>每日必赚</h2>
  <p>1、媒体签到：连续签到7天可获得180狐币<br/>
  2、限时抢：7：00、9:00、12:00/18:00/21:00参与抢红包，最高可得50狐币</p>
  <div class="yd3_b">
  <div class="clearfix yd3_ba">
  <div class="baguetteBoxOne gallery">
   <?php if(is_array($photos_3) || $photos_3 instanceof \think\Collection || $photos_3 instanceof \think\Paginator): if( count($photos_3)==0 ) : echo "" ;else: foreach($photos_3 as $key=>$vo): ?>
                <a href="<?php echo cmf_get_image_url($vo['url']); ?>"><img  src="<?php echo cmf_get_image_url($vo['url']); ?>"></a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
  </div>
  <h3>*当天赚取的金币会在第二天自动转换为零钱到您的零钱账户中，可随时提现</h3>
  <h4>还有分享赚钱、晒收入赚钱、转发赚钱、评论赚钱、答题赚钱等着你，还不赶快去试试！</h4>
  <a href="#" class="ljxz start" data-url="<?php echo strip_tags($article['post_source']) ?>">立即下载</a>
  </div>
  <!--主体部分结束--> 
</div>
<script src="/themes/fanbao/public/assets/js/jquery-1.10.2.min.js"></script>
<script src="/themes/fanbao/public/assets/js/baguettebox.min.js"></script>

<script>
baguetteBox.run('.baguetteBoxOne', {
        animation: 'fadeIn',
    });

$('.start').on('click', function(event) {
        event.preventDefault();
        window.location.href = $(this).data('url');
});
</script>


</body>

</html>