<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function blacklists(User $user){
        return view('pages.blacklists.blacklists',[
            'Blacklists' => User::where([
                ['banned','=',1],
                ['removed','=',0],
            ])->get(),
            'BlaklistCount' => User::where([
                ['banned','=',1],
                ['removed','=',0],
            ])->count(),
        ]);
    }
    public function users(User $user){
        return view('pages.users.users',[
            'Users' => User::where('removed','0')->get(),
        ]);
    }
    public function edit(Request $request){
        if(User::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.users.edit',[
                'User' => User::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=', 0]
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(User::where([['id', '=',e($request->id)]])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'name' => e($request->name),
                'email' => e($request->email),
                'phone' => e($request->phone),
                'banned' => e($request->banned),
            ]);
            return redirect(route('users'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function delete(Request $request){
        if(User::where([['id', '=',e($request->id)],['id', '!=',e(session('user.id'))] ])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'removed' => 1
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }

    public function ban(Request $request){
        if(User::where([['id', '=',e($request->id)],['id', '!=',e(session('user.id'))] ])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'banned' => 1
                'removed' => 1
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }

    public function unban(Request $request){
        if(User::where([['id', '=',e($request->id)],['id', '!=',e(session('user.id'))] ])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'banned' => 0
                'removed' => 0
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }

    public function enableemail(Request $request){
        if(User::where([['id', '=',e($request->id)]])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'email_enabled' => 1,
            ]);
            return redirect(route('users'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function enablemobile(Request $request){
        if(User::where([['id', '=',e($request->id)]])->count() > 0){
            User::where([
                ['id', '=',e($request->id)],
            ])->update([
                'phone_enabled' => 1,
            ]);
            return redirect(route('users'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

}
