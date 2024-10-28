<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;
use App\Models\Category;
class LikeController extends Controller
{
    public function likes(Request $request){
        return view('pages.likes.likes',[
            'LikeCount' => Like::where([
                ['removed', '=',0]
            ])->count(),
            'Likes' => Like::where([
                ['removed', '=',0]
            ])->get()
        ]);
    }
    public function likers(Request $request){

        foreach(User::where('removed',0)->get() as $User){
            $LikeCount[$User->id] = Like::where([ ['id_from','=',e($User->id)], ['removed', '=',0] ])->count();
        }
        return view('pages.likers.likers',[
            'LikeCount' => $LikeCount,
            'TotalLikeCount' => Like::where([ ['removed', '=',0] ])->count(),
            'Likes' => Like::where([
                ['removed', '=',0]
            ])->get(),
            'Users' => User::where([
                ['removed', '=',0]
            ])->get()
        ]);
    }
    public function categoriesliked(Request $request){

        foreach(Category::where('removed',0)->get() as $Category){
            $LikeCount[$Category->id] = Like::where([ ['id_category','=',e($Category->id)], ['removed', '=',0] ])->count();
        }
        return view('pages.categoriesliked.categoriesliked',[
            'LikeCount' => $LikeCount,
            'TotalLikeCount' => Like::where([ ['removed', '=',0] ])->count(),
            'Likes' => Like::where([
                ['removed', '=',0]
            ])->get(),
            'Categories' => Category::where([
                ['removed', '=',0]
            ])->get()
        ]);
    }

    public function delete(Request $request){
        if(Like::where([['id', '=',e($request->id)]])->count() > 0){
            Like::where([
                ['id', '=',e($request->id)],
            ])->update([
                'removed' => 1,
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }
}
