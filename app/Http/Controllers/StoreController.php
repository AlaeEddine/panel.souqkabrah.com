<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Country;
use App\Models\City;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
class StoreController extends Controller
{
    public function stores(Request $request){
        return view('pages.stores.stores',[
            'StoresCount' => Store::where([ ['removed', '=',0] ])->count(),
            'Stores' => Store::where([
                ['removed', '=',0]
            ])->get(),
            'Categories' => Category::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }

    public function edit(Request $request){
        if(Store::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.stores.edit',[
                'Store' => Store::where([
                    ['id', '=',e($request->id)],
                ])->first(),
                'Countries' => Country::get(),
                'Cities' => City::get(),
                'Categories' => Category::where('removed',0)->get(),
                'SubCategories' => SubCategory::where('removed',0)->get(),
                'SubSubCategories' => SubSubCategory::where('removed',0)->get(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        $DATA_TO_UPDATE = array_merge([
            'name' => e($request->name),
            'id_country' => e($request->id_country),
            'name_country' => e(Country::where('id', e($request->id_country))->first()->name_ar),
            'id_city' => e($request->id_city),
            'name_city' => e(City::where('id', e($request->id_city))->first()->name_ar),
            'id_category' => e($request->id_category),
            'name_category' => e(Category::where('id', e($request->id_category))->first()->name_1),
            'id_subcategory' => e($request->id_subcategory),
            'name_subcategory' => e(SubCategory::where('id', e($request->id_subcategory))->first()->name_1),
            'id_subsubcategory' => e($request->id_subsubcategory),
            'name_subsubcategory' => e(SubSubCategory::where('id', e($request->id_subsubcategory))->first()->name_1),
            'special' => e($request->special),
            'archived' => e($request->archived),
            'valide' => e($request->valide),
            'description' => e($request->description),
            'banned' => e($request->banned),
        ],$DATA_TO_UPDATE);
        Store::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('stores'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(Store::where([['id', '=',e($request->id)]])->count() > 0){
            Store::where([
                ['id', '=',e($request->id)],
            ])->delete();
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }
}
