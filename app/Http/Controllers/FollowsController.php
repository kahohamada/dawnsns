<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followlist(){

        $followlists = Follow::join('users','follows.follow','=','users.id')
            ->where('follower', Auth::id())
            ->select('users.id','users.images')
            ->get();

        $followposts = Follow::join('users', 'follows.follow', '=','users.id')
            ->join('posts', 'users.id', '=' ,'posts.user_id')
            ->where('follower', Auth::id())
            ->select('users.id','users.images', 'posts.posts', 'posts.created_at')
            ->get();

        return view('follows.followList', ['followlists'=>$followlists, 'followposts'=>$followposts]);
    }


    public function followerlist(){

        $followerlists = Follow::join('users','follows.follower','=','users.id')
            ->where('follow', Auth::id())
            ->select('users.id','users.images')
            ->get();

        $followerposts = Follow::join('users', 'follows.follower', '=','users.id')
            ->join('posts', 'users.id', '=' ,'posts.user_id')
            ->where('follow', Auth::id())
            ->select('users.id','users.images', 'posts.posts', 'posts.created_at')
            ->get();

        return view('follows.followerList', ['followerlists' => $followerlists, 'followerposts' => $followerposts]);
    }


    public function follow($follow){
        Follow::create([
            'follower' => Auth::id(),
            'follow' => $follow,
        ]);

        return back();
    }

    public function unfollow($unfollow){
        Follow::where('follow', $unfollow)
            ->where('follower', Auth::id())
            ->delete();

        return back();
    }


}
