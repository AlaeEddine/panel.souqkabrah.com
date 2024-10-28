<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function pages(Request $request){
        return view('pages.pages.pages',[
            'CountPages' => Page::where([
                ['removed', '=',0]
            ])->count(),
            'Pages' => Page::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.pages.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        $DATA_TO_INSERT = array_merge([
            'title' => e($request->title),
            'url' => e($request->url),
            'html' => $request->html,
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        Page::insert($DATA_TO_INSERT);
        return redirect(route('pages'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(Page::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.pages.edit',[
                'Page' => Page::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=', 0]
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        $DATA_TO_UPDATE = array_merge([
            'title' => e($request->title),
            'url' => e($request->url),
            'html' => $request->html,
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        Page::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('pages'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(Page::where([['id', '=',e($request->id)] ])->count() > 0){
            Page::where([
                ['id', '=',e($request->id)],
            ])->update([
                'removed' => 1
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }


}
