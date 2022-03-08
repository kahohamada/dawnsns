<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //コンストラクタ Laravelにおけるミドルウェアというものを読み込む記述???ログインできているかどうか」を確認してるぽい
    public function __construct()
    {
        $this->middleware('auth');
    }


//index
    public function index(){
        $lists = Post::orderBy('posts.created_at','desc')
            ->get();
        return view('posts.index',['lists'=>$lists]);
    }

    public function tweet(Request $request){
        $tweet = $request->input('tweet');

        Post::create([
            'user_id' => Auth::id(),
            'posts' => $tweet,
        ]);

        return redirect('/top');
    }

//tweet内容更新
    public function uptweet(Request $request){
        $uptweet = $request->input('uptweet');
        $upid = $request->input('upid');

        Post::where('id',$upid)
            ->update([
                'posts' => $uptweet,
            ]);

        return redirect('/top');
    }

//tweet削除
    public function trash($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

}
