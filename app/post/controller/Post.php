<?php
namespace app\post\controller;

use app\post\model\Content;
use think\Controller;

class Post extends Controller
{
    function index()
    {
        if(request()->isPost())
        {
            $nickname = input('post.post_nickname');
            $post_content = input('input.post_content');
            $data = input('post.');
            Content::insert($data);
            return $this->success('投稿成功',url('show\show\index'));
        }
        return view();
    }
}