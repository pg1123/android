<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"themes/admin_simpleboot3/admin/theme/index.html";i:1516676889;s:68:"/var/www/thinkcmf/public/themes/admin_simpleboot3/public/header.html";i:1516676889;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo \think\Request::instance()->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo url('theme/index'); ?>">所有模板</a></li>
        <li><a href="<?php echo url('theme/install'); ?>">安装模板</a></li>
    </ul>
    <form method="post" class="js-ajax-form margin-top-20">
        <?php  $status=array("1"=>lang('DISPLAY'),"0"=>lang('HIDDEN')); ?>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th>模板</th>
                <th>模板名称</th>
                <th>版本号</th>
                <th>语言</th>
                <th>作者</th>
                <th>模板描述</th>
                <th width="180"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($themes) || $themes instanceof \think\Collection || $themes instanceof \think\Paginator): if( count($themes)==0 ) : echo "" ;else: foreach($themes as $key=>$vo): ?>
                <tr>
                    <td>
                        <?php echo $vo['theme']; if($vo['theme'] == $default_theme): ?>
                            <span class="label label-success">当前启用</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo $vo['version']; ?></td>
                    <td><?php echo $vo['lang']; ?></td>
                    <td><?php echo $vo['author']; ?></td>
                    <td><?php echo $vo['description']; ?></td>
                    <td>
                        <a href="javascript:parent.openIframeLayer('<?php echo url('theme/files',array('theme'=>$vo['theme'])); ?>','<?php echo $vo['name']; ?>文件列表',{});">设计</a>
                        <a href="<?php echo url('theme/update',array('theme'=>$vo['theme'])); ?>" class="js-ajax-dialog-btn"
                           data-msg="确定更新此模板吗？">更新</a>


                        <?php if(($vo['name'] == 'simpleboot3') OR ($vo['theme'] == $default_theme)): ?>
                            <font color="#cccccc">卸载</font>
                            <?php else: ?>
                            <a href="<?php echo url('theme/uninstall',array('theme'=>$vo['theme'])); ?>" class="js-ajax-dialog-btn"
                               data-msg="您设置的模板数据将被删除，<br>确定卸载此模板吗？">卸载</a>
                        <?php endif; if($vo['theme'] == $default_theme): ?>
                            <font color="#cccccc">启用</font>
                            <?php else: ?>
                            <a href="<?php echo url('theme/active',array('theme'=>$vo['theme'])); ?>" class="js-ajax-dialog-btn"
                               data-msg="确定使用此模板吗？">启用</a>
                        <?php endif; ?>







                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>模板</th>
                <th>模板名称</th>
                <th>版本号</th>
                <th>语言</th>
                <th>作者</th>
                <th>模板描述</th>
                <th width="180"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </tfoot>
        </table>
    </form>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>