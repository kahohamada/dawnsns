<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    //コンストラクタ Laravelにおけるミドルウェアというものを読み込む記述???ログインできているかどうか」を確認してるぽい
    public function __construct()
    {
        $this->middleware('auth');
    }


//index
    public function index(){
        $list = DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }
}
