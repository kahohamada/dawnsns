<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function usersearch(Request $request){
        $search = $request->input('search');

        $follow_users = Follow::where('follower',Auth::id())
            ->get()
            ->toArray();

        if(!empty($search)){
            $users=User::where('id','<>',Auth::id())
                ->where('username','like','%'.$search.'%')
                ->get();
        } else{
            $users=User::where('id','<>',Auth::id())
                ->get();
        }

        return view('users.search',['users'=>$users,'follow_users'=>$follow_users]);
    }


    public function upprofile(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:2|max:12',
            'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
            'newpassword' => 'min:8|max:20|confirmed|alpha_num',
            'bio' => 'max:150',
            'iconimage' => 'image',
        ]);

        $user = Auth::user();
        $image = $request->file('iconimage');
        $uppass = $request->input('newpassword');
        //ここにパスワードの保存を指定

        //拡張子付きでファイル名を取得、名前の保存
        if(!empty($image)){
            $filename = $image->getClientOriginalName();
            $image->storeAs('/images', $filename,'disk');

            User::where('id', Auth::id())->update([
                'images' => $filename,
            ]);
        }

        if(!empty($uppass)){
            User::where('id', Auth::id())->update([
                'password' => bcrypt($uppass),
            ]);
        }

    User::where('id', Auth::id())->update([
        'username' => $request->input('username'),
        'mail' => $request->input('mail'),
        'bio' => $request->input('bio'),
    ]);

    return redirect('/profile');

    }

}
