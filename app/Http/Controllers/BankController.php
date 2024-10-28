<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
class BankController extends Controller
{

    public function banks(Request $request){
        return view('pages.banks.banks',[
            'BanksCount' => Bank::where([ ['removed', '=',0] ])->count(),
            'Banks' => Bank::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.banks.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_CREATE = [];
        $DATA_TO_CREATE = array_merge([
            'name_1' => e($request->name_1),
            'name_2' => e($request->name_2),
            'valide' => e($request->valide),
        ],$DATA_TO_CREATE);
        Bank::insert($DATA_TO_CREATE);
        return redirect(route('banks'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(Bank::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.banks.edit',[
                'Bank' => Bank::where([
                    ['id', '=',e($request->id)],
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        $DATA_TO_UPDATE = array_merge([
            'name_1' => e($request->name_1),
            'name_2' => e($request->name_2),
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        Bank::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('banks'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(Bank::where([['id', '=',e($request->id)]])->count() > 0){
            Bank::where([
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
