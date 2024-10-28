<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Html;
use App\Models\Country;

class HtmlController extends Controller
{
    public function html(Request $request){
        return view('pages.html.html',[
            'CountHtml' => Html::where([
                ['removed', '=',0]
            ])->count(),
            'Htmls' => Html::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.html.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        $DATA_TO_INSERT = array_merge([
            'id_country' => e($request->country),
            'name_country' => Country::where([ ['id','=',e($request->country)] ])->first()->name_ar,
            'header' => $request->header,
            'footer' => $request->footer,
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        Html::insert($DATA_TO_INSERT);
        return redirect(route('html'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(Html::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.html.edit',[
                'Html' => Html::where([
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
            'id_country' => e($request->country),
            'name_country' => Country::where([ ['id','=',e($request->country)] ])->first()->name_ar,
            'header' => $request->header,
            'footer' => $request->footer,
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        Html::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('html'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(Html::where([['id', '=',e($request->id)] ])->count() > 0){
            Html::where([
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
