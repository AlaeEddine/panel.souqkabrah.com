<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoneyTransfert;
class MoneyTransfertController extends Controller
{
    public function moneytransferts(Request $request){
        return view('pages.moneytransferts.moneytransferts',[
            'MoneyTransfertsCount' => MoneyTransfert::where([ ['removed', '=',0] ])->count(),
            'MoneyTransferts' => MoneyTransfert::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function delete(Request $request){
        if(MoneyTransfert::where([['id', '=',e($request->id)]])->count() > 0){
            MoneyTransfert::where([
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
