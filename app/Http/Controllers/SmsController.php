<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sms;
use App\Models\SmsGroup;
use App\Models\User;

class SmsController extends Controller
{
    public function send(Request $request){
        if(SmsGroup::where([['id', '=', e($request->idusers) ],['removed','=',0]])->count() > 0){
            foreach(SmsGroup::where([['id', '=', e($request->idusers) ],['removed','=',0]])->get() as $ID_USERS){
                if($ID_USERS->idusers != null){
                    if(strstr($ID_USERS->idusers, ',')){
                        $IDS = explode(',',$ID_USERS->idusers);
                    }else{
                        $IDS[] = $ID_USERS->idusers;
                    }
                    foreach($IDS as $ID):
                        foreach(User::where([['id', '=', e($ID) ],['removed','=',0]])->get() as $User):
                            if($User->id == $ID):
                                if($User->phone != null):
                                    Sms::insert([
                                        'id_from' => e(session('user.id')),
                                        'name_from' => e(session('user.name')),
                                        'email_from' => e(session('user.email')),
                                        'phone_from' => e(session('user.phone')),
                                        'id_to' => e($User->id),
                                        'name_to' => e($User->name),
                                        'email_to' => e($User->email),
                                        'phone_to' => e($User->phone),
                                        'sms' => e($request->sms),
                                    ]);
                                endif;
                            endif;
                        endforeach;
                    endforeach;
                    return redirect(route('smsgroups'))->with('success_sms',__('تم إرسال SMS إلى المجموعة في حالة ما توفرو على رقم جوال'));
                }else{
                    return redirect(route('smsgroups'))->with('success_sms',__('تم إرسال SMS إلى المجموعة في حالة ما توفرو على رقم جوال'));
                }
            }
        }else{
            return redirect(route('smsgroups'))->with('error_sms',__('لا يمكن أن تكون لائحة الأعضاء فارغة'));
        }
    }
    public function sms(Request $request){
        return view('pages.sms.sms',[
            'CountSms' => Sms::where([
                ['removed', '=',0]
            ])->count(),
            'Smses' => Sms::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function delete(Request $request){
        if(Sms::where([['id', '=',e($request->id)] ])->count() > 0){
            Sms::where([
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
