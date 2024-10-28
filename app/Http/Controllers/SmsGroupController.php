<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsGroup;
use App\Models\User;

class SmsGroupController extends Controller
{
    public function smsgroups(Request $request){
        return view('pages.smsgroups.smsgroups',[
            'CountSmsGroups' => SmsGroup::where([
                ['removed', '=',0]
            ])->count(),
            'SmsGroups' => SmsGroup::where([
                ['removed', '=',0]
            ])->get(),
            'Users' => User::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.smsgroups.create', [
            'Users' => User::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        $idusers = "";
        if($request->idusers != null){
            foreach($request->idusers as $ids):
                $idusers .="$ids,";
            endforeach;
            $idusers = substr($idusers,0,-1);
        }
        $DATA_TO_INSERT = array_merge([
            'name' => e($request->name),
            'idusers' => e($idusers),
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        SmsGroup::insert($DATA_TO_INSERT);
        return redirect(route('smsgroups'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function edit(Request $request){
        if(SmsGroup::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.smsgroups.edit',[
                'SmsGroup' => SmsGroup::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=', 0]
                ])->first(),
                'Users' => User::where([
                    ['removed', '=',0]
                ])->get(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        $idusers = "";
        if($request->idusers != null){
            foreach($request->idusers as $ids):
                $idusers .="$ids,";
            endforeach;
            $idusers = substr($idusers,0,-1);
        }
        $DATA_TO_UPDATE = array_merge([
            'name' => e($request->name),
            'idusers' => e($idusers),
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        SmsGroup::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('smsgroups'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(SmsGroup::where([['id', '=',e($request->id)] ])->count() > 0){
            SmsGroup::where([
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
