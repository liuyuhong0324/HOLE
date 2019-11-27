<?php
namespace app\show\controller;

use app\show\model\Content as ContentModel;

class Show
{
    function index()
    {
        $content = new ContentModel();
        $content -> select();
        $list = $content -> paginate();
        return view('index',['list' => $list]);
    }
}