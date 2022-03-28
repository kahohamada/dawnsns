<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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
