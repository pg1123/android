<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Db;
use app\portal\model\PortalPostModel;
use app\portal\service\ApiService;
use app\portal\model\PortalCategoryModel;
use app\portal\service\PostService;



class FanbaoquanController extends HomeBaseController
{
    public function index()
    {
        if (!$this->isMobile()){
            echo '请用手机登录: fanbazhuan.com';
            exit;
        }
        return $this->fetch(':fanbaoquan');
    }

}
