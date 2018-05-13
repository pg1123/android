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

class IndexController extends HomeBaseController
{
    public function index()
    {
        /*if (!$this->isMobile()){
            echo '请用手机登录fanbazhuan.com，公众号:fanbaozhuan';
            exit;
        }*/
        $articles =ApiService::articles(['category_ids'=>'1'])['articles'];
        $banners =ApiService::articles(['category_ids'=>'3'])['articles'];
        //print_r($articles);exit;
        //$article = Db::name('portal_post')->where('id',1)->find();
        //$articles = Db::name('portal_post')->select();
        //print_r($banners);exit;
        $this->assign('articles',$articles);
        $this->assign('banners', $banners);
        //print_r($article);exit;
        return $this->fetch(':index');
    }

    // shi wan gong lue
    public function gonglue()
    {
        return $this->fetch(':gonglue');
    }
}
