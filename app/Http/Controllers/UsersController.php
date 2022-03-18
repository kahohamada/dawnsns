<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function usersearch(Request $request){
        $search = $request->input('search');

        if(!empty($search)){
            $users=User::where('id','<>',Auth::id())
                ->where('username','like','%'.$search.'%')
                ->get();
        } else{
            $users=User::where('id','<>',Auth::id())
                ->get();
        }

        return view('users.search',['users'=>$users]);
    }
}
