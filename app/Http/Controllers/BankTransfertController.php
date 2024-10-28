<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankTransfert;

class BankTransfertController extends Controller
{
    public function banktransferts(Request $request){
        return view('pages.banktransferts.banktransferts',[
            'BankTransfertsCount' => BankTransfert::where([ ['removed', '=',0] ])->count(),
            'BankTransferts' => BankTransfert::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function delete(Request $request){
        if(BankTransfert::where([['id', '=',e($request->id)]])->count() > 0){
            BankTransfert::where([
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
