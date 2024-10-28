<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUser;
use App\Models\Country;
use App\Models\User;

class ContactUserController extends Controller
{
    public function contactusers(Request $request){
        return view('pages.contactusers.contactusers',[
            'Countries' => Country::get()
        ]);
    }
    public function delete(Request $request){
        if(ContactUser::where([['id', '=',e($request->id)]])->count() > 0){
            ContactUser::where([
                ['id', '=',e($request->id)],
            ])->update([
                'removed' => 1,
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }

    public function send(Request $request){
        if($request->user != null){
            foreach($request->user as $ID):
                foreach(User::where([['id', '=', e($ID)],['removed','=',0]])->get() as $User):
                    if($User->id == $ID):
                        ContactUser::insert([
                            'id_country' => e($request->country),
                            'name_country' => Country::where([['id','=',e($request->country)]])->first()->name_ar,
                            'id_user' => e($User->id ),
                            'name_user' => e($User->name ),
                            'message' => e($request->message),
                        ]);
                    endif;
                endforeach;
            endforeach;
            return redirect(route('contactusers'))->with('success',__('تم إرسال رسالتكم'));
        }else{
            return redirect(route('smsgroups'))->with('success',__('تم إرسال SMS إلى المجموعة في حالة ما توفرو على رقم جوال'));
        }
    }

}
