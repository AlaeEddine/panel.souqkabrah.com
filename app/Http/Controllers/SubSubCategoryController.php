<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller{

    public function subsubcategories(Request $request){
        return view('pages.subsubcategories.subsubcategories',[
            'SubSubCategories' => SubSubCategory::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function edit(Request $request){
        if(SubSubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            return view('pages.subsubcategories.edit',[
                'SubSubCategory' => SubSubCategory::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=',0]
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(SubSubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            SubSubCategory::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->update([
                'icon' => e($request->icon),
                'name_1' => e($request->name_1),
                'name_2' => e($request->name_2),
            ]);
            $SubCategoryId = SubSubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->first()->subcategory;
            return redirect(route('subcategories.edit',$SubCategoryId))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function delete(Request $request){
        if(SubSubCategory::where([['id', '=',e($request->id)]])->count() > 0){
            SubSubCategory::where([
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

