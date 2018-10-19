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



class YueduController extends HomeBaseController
{
    public function index()
    {
        if (!$this->isMobile()){
            echo '请用手机登录: fanbazhuan.com';
            exit;
        }
        $articles =ApiService::articles(['category_ids'=>'2'])['articles'];
        //print_r($articles);exit;
        //$article = Db::name('portal_post')->where('id',1)->find();
        //$articles = Db::name('portal_post')->select();
        $this->assign('articles',$articles);
        //print_r($article);exit;
        return $this->fetch(':yuedu');
    }

    public function info()
    {

        $portalCategoryModel = new PortalCategoryModel();
        $postService         = new PostService();

        $articleId  = $this->request->param('id', 0, 'intval');
        $categoryId = $this->request->param('cid', 0, 'intval');
        $article    = $postService->publishedArticle($articleId, $categoryId);
        if (empty($article)) {
            abort(404, '文章不存在!');
        }


        $prevArticle = $postService->publishedPrevArticle($articleId, $categoryId);
        $nextArticle = $postService->publishedNextArticle($articleId, $categoryId);

        $tplName = 'article';

        if (empty($categoryId)) {
            $categories = $article['categories'];

            if (count($categories) > 0) {
                $this->assign('category', $categories[0]);
            } else {
                abort(404, '文章未指定分类!');
            }

        } else {
            $category = $portalCategoryModel->where('id', $categoryId)->where('status', 1)->find();
            if (empty($category)) {
                abort(404, '文章不存在!');
            }

            $this->assign('category', $category);

            $tplName = empty($category["one_tpl"]) ? $tplName : $category["one_tpl"];
        }

        Db::name('portal_post')->where(['id' => $articleId])->setInc('post_hits');


        hook('portal_before_assign_article', $article);

        $this->assign('article', $article);
        $this->assign('prev_article', $prevArticle);
        $this->assign('next_article', $nextArticle);
        $photos = $article['more']['photos'];
        $this->assign('photos_1', array_slice($photos, 0,4));
        $this->assign('photos_2', array_slice($photos, 4,3));
        $this->assign('photos_3', array_slice($photos, 7,3));
        //print_r(array_slice($photos, 7,3));exit;
        $tplName = empty($article['more']['template']) ? $tplName : $article['more']['template'];
        return $this->fetch(":ydinfo");
    }
}
