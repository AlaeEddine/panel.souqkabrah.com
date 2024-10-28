<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileData;

class MobileDataController extends Controller
{
    public function mobiledata(Request $request){
        return view('pages.mobiledata.mobiledata',[
            'CountMobileDatas' => MobileData::where([
                ['removed', '=',0]
            ])->count(),
            'MobileDatas' => MobileData::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.mobiledata.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        $DATA_TO_INSERT = array_merge([
            'name' => e($request->name),
            'price' => e($request->price),
            'number' => e($request->number),
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        MobileData::insert($DATA_TO_INSERT);
        return redirect(route('mobiledata'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(MobileData::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.mobiledata.edit',[
                'MobileData' => MobileData::where([
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
            'name' => e($request->name),
            'price' => e($request->price),
            'number' => e($request->number),
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        MobileData::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('mobiledata'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(MobileData::where([['id', '=',e($request->id)] ])->count() > 0){
            MobileData::where([
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
