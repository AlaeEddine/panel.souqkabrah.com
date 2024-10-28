<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function cities(City $city){
        return view('pages.cities.cities',[
            'Cities' => $city->get(),
        ]);
    }
    public function edit(Request $request){
        if(City::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.cities.edit',[
                'City' => City::where([
                    ['id', '=',e($request->id)],
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(City::where([['id', '=',e($request->id)]])->count() > 0){
            City::where([
                ['id', '=',e($request->id)],
            ])->update([
                'name_ar' => e($request->name_ar),
                'name_en' => e($request->name_en),
            ]);
            return redirect(route('cities'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function delete(Request $request){
        if(City::where([['id', '=',e($request->id)]])->count() > 0){
            City::where([
                ['id', '=',e($request->id)],
            ])->delete();
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }

}
