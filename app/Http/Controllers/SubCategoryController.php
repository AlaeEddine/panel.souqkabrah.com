<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller{

    public function subcategories(Request $request){
        return view('pages.subcategories.subcategories',[
            'SubCategories' => SubCategory::where([
                ['removed', '=',0]
            ])->get(),
            'SubSubCategories' => SubSubCategory::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function edit(Request $request){
        if(SubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            $HasSubSubCategory = SubCategory::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->first()->has_sub_sub_category;
            return view('pages.subcategories.edit',[
                'SubCategory' => SubCategory::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=',0]
                ])->first(),
                'HasSubSubCategory' => $HasSubSubCategory,
                'SubSubCategories' => SubSubCategory::where([
                    ['subcategory', '=',e($request->id)],
                    ['removed', '=',0]
                ])->get(),

            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(SubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            SubCategory::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->update([
                'icon' => e($request->icon),
                'name_1' => e($request->name_1),
                'name_2' => e($request->name_2),
            ]);
            $CategoryId = SubCategory::where([['id', '=',e($request->id)],['removed', '=',0]])->first()->category;
            return redirect(route('categories.edit',$CategoryId))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function delete(Request $request){
        if(SubCategory::where([['id', '=',e($request->id)]])->count() > 0){
            SubCategory::where([
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

