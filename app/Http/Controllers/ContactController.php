<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller{

    public function contact(Request $request){
        return view('pages.contact.contact',[
            'ContactCount' => Contact::where([
                ['removed', '=',0]
            ])->count(),
            'Contacts' => Contact::where([
                ['removed', '=',0]
            ])->get()
        ]);
    }
    public function delete(Request $request){
        if(Contact::where([['id', '=',e($request->id)]])->count() > 0){
            Contact::where([
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
