<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Ad;
class CommentController extends Controller
{
    public function comments(Request $request){
        $CommentCount = [];
        foreach(Ad::where('removed',0)->get() as $Ad){
            $CommentCount[$Ad->id] = Comment::where([ ['id_ads','=',e($Ad->id)], ['removed', '=',0] ])->count();
        }
        return view('pages.comments.comments',[
            'CommentCount' => $CommentCount,
            'TotalComment' => Comment::where([ ['removed', '=',0] ])->count(),
            'Comments' => Comment::where([
                ['removed', '=',0]
            ])->get(),
            'Ads' => Ad::where([
                ['removed', '=',0]
            ])->get()
        ]);

    }
    public function edit(Request $request){
        if(Comment::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            return view('pages.comments.edit',[
                'Comment' => Comment::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=',0]
                ])->first(),
                'Ads' => Ad::where([
                    ['removed', '=',0]
                ])->get(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(Comment::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            Comment::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->update([
                'comment' => e($request->comment),
                'valide' => e($request->valide),
                'banned' => e($request->banned),
            ]);
            return redirect(route('comments'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function bannedcomments(Request $request){
        return view('pages.bannedcomments.bannedcomments',[
            'BannedCommentCount' => Comment::where([
                ['banned', '!=',0],
                ['removed', '=',0]
            ])->count(),
            'BannedComments' => Comment::where([
                ['banned', '!=',0],
                ['removed', '=',0]
            ])->get(),
        ]);
    }

    public function delete(Request $request){
        if(Comment::where([['id', '=',e($request->id)]])->count() > 0){
            Comment::where([
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
