<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoogleAd;

class GoogleAdController extends Controller
{
    public function googleads(Request $request){
        return view('pages.googleads.googleads',[
            'CountGoogleAds' => GoogleAd::where([
                ['removed', '=',0]
            ])->count(),
            'GoogleAds' => GoogleAd::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.googleads.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        if($request->date_start != null): $request->date_start = date('Y-m-d H:i:s', strtotime($request->date_start)); else: $request->date_start = null; endif;
        if($request->date_end != null): $request->date_end = date('Y-m-d H:i:s', strtotime($request->date_end)); else: $request->date_end = null; endif;
        $DATA_TO_INSERT = array_merge([
            'title' => e($request->title),
            'description' => e($request->description),
            'position' => e($request->position),
            'date_start' => e($request->date_start),
            'date_end' => e($request->date_end),
            'css' => $request->css,
            'js' => $request->js,
            'html' => $request->html,
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        GoogleAd::insert($DATA_TO_INSERT);
        return redirect(route('googleads'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(GoogleAd::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.googleads.edit',[
                'GoogleAd' => GoogleAd::where([
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
        if($request->date_start != null): $request->date_start = date('Y-m-d H:i:s', strtotime($request->date_start)); else: $request->date_start = null; endif;
        if($request->date_end != null): $request->date_end = date('Y-m-d H:i:s', strtotime($request->date_end)); else: $request->date_end = null; endif;
        $DATA_TO_UPDATE = array_merge([
            'title' => e($request->title),
            'description' => e($request->description),
            'position' => e($request->position),
            'date_start' => e($request->date_start),
            'date_end' => e($request->date_end),
            'css' => $request->css,
            'js' => $request->js,
            'html' => $request->html,
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        GoogleAd::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('googleads'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(GoogleAd::where([['id', '=',e($request->id)] ])->count() > 0){
            GoogleAd::where([
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
