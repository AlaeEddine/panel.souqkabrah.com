<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function plans(Request $request){
        return view('pages.plans.plans',[
            'CountPlans' => Plan::where([ ['removed', '=',0] ])->count(),
            'Plans' => Plan::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.plans.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        $DATA_TO_INSERT = array_merge([
            'name' => e($request->name),
            'price' => e($request->price),
            'number' => e($request->number),
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        Plan::insert($DATA_TO_INSERT);
        return redirect(route('plans'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(Plan::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.plans.edit',[
                'Plan' => Plan::where([
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
        Plan::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('plans'))->with('success',__('تم التعديل بنجاح'));
    }
    public function delete(Request $request){
        if(Plan::where([['id', '=',e($request->id)]])->count() > 0){
            Plan::where([
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
