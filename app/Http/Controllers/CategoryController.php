<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Setting;
use App\Models\SubSubCategory;

class CategoryController extends Controller{

    public function uploadiconssubmit(Request $request) {
        $URL_SETTINGS = Setting::where('id',1)->first()->url;
        $request->validate([
            'icon' => 'max:10000',
        ]);
        if ($request->hasFile('icon')) {
            $files = $request->file('icon');
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = "../../www.opensook.ma/public/uploads/icons/";
                $file->move($destinationPath, $fileName);
                $picturesurl = '/uploads/icons/'.$fileName;
                return $picturesurl;
            endforeach;

        }else{
            return null;
        }
    }

    public function categories(Request $request){
        return view('pages.categories.categories',[
            'Categories' => Category::where([
                ['removed', '=',0]
            ])->get(),
            'SubCategories' => SubCategory::where([
                ['removed', '=',0]
            ])->get(),
            'SubSubCategories' => SubSubCategory::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function edit(Request $request){
        if(Category::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            return view('pages.categories.edit',[
                'Category' => Category::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=',0]
                ])->first(),
                'SubCategories' => SubCategory::where([
                    ['category', '=',e($request->id)],
                    ['removed', '=',0]
                ])->get(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(Category::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            Category::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->update([
                'icon' => e($request->icon),
                'name_1' => e($request->name_1),
                'name_2' => e($request->name_2),
            ]);
            return redirect(route('categories'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }

    public function delete(Request $request){
        if(Category::where([['id', '=',e($request->id)]])->count() > 0){
            Category::where([
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

