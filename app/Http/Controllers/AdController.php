<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Filter;
use App\Models\Currency;
use App\Models\Country;
use App\Models\City;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
class AdController extends Controller
{
    public function ads(Request $request){
        return view('pages.ads.ads',[
            'CountAds' => Ad::where([
                ['removed', '=',0]
            ])->count(),
            'Ads' => Ad::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function bannedads(Request $request){
        return view('pages.bannedads.bannedads',[
            'CountAds' => Ad::where([
                ['banned', '!=',0],
                ['removed', '=',0]
            ])->count(),
            'Ads' => Ad::where([
                ['banned', '!=',0],
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function filterads(Request $request){
        return view('pages.filterads.filterads',[
            'CountFilter' => Filter::where([
                ['removed', '=',0]
            ])->count(),
            'Filters' => Filter::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }

    public function filtercreate(Request $request){
        return view('pages.filterads.create');
    }
    public function filteredit(Request $request){
        return view('pages.filterads.edit',[
            'FilterAd' => Filter::where([
                ['id', '=' , e($request->id)],
                ['removed', '=', 0]
            ])->first()
        ]);
    }
    public function filtereditsubmit(Request $request){
        Filter::where([
            ['id', '=' , e($request->id)],
            ['removed', '=', 0]
        ])->update([
            'keywordAd' => e($request->keywordAd),
        ]);
        return redirect(route('filterads'))->with('success', __('تم التعديل بنجاح'));

    }
    public function filtercreatesubmit(Request $request){
        Filter::insert([
            'keywordAd' => e($request->keywordAd),
            'removed' => 0
        ]);
        return redirect(route('filterads'))->with('success', __('تمت الإضافة بنجاح'));
    }
    public function create(Request $request){
        return view('pages.ads.create', [
            'Countries' => Country::get(),
            'Cities' => City::get(),
            'Categories' => Category::where('removed',0)->get(),
            'SubCategories' => SubCategory::where('removed',0)->get(),
            'SubSubCategories' => SubSubCategory::where('removed',0)->get(),

        ]);
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        if($request->pictures != null){
            foreach($request->pictures as $K=>$PictureLink):
                $DATA_TO_INSERT = array_merge(["picture".($K+1) => $PictureLink],$DATA_TO_INSERT);
            endforeach;
        }
        if($request->id_contact == 1){
            $NameContact = 'البريد الإلكتروني';
        }else{
            $NameContact = 'رقم الجوال';
        }
        $DATA_TO_INSERT = array_merge([
            'title' => e($request->title),
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
            'fixed' => e($request->fixed),
            'id_contact' => e($request->id_contact),
            'id_currency' => e($request->id_currency),
            'name_currency' => Currency::where([ ['id','=',e($request->id_currency)],['removed','=',0]])->first()->name,
            'price' => e($request->price),
            'id_currency' => e($request->currency),
            'name_currency' => e(Currency::where([['removed','=',0],['id','=',e($request->currency)]])->first()->symbol),
            'name_contact' => e($NameContact),
            'mazad' => e($request->mazad),
            'valide' => e($request->valide),
            'status' => e($request->status),
            'allow_comments' => e($request->allow_comments),
            'details' => e($request->details),
            'tags' => e($request->tags),
            'banned' => e($request->banned),
        ],$DATA_TO_INSERT);
        Ad::insert($DATA_TO_INSERT);
        return redirect(route('ads'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public static function upload(Request $request){
        $request->validate([
            'file' => 'max:10000',
        ]);
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $k=>$file):
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(0,9999).'-'.sha1(date('Y-m-d H:i:s')).'.'.sha1($filename).'.'.$extension;
                $destinationPath = '../../www.opensook.ma/public/uploads/ads/';
                $file->move($destinationPath, $fileName);
                $picturesurl[$k] = '/uploads/ads/'.$fileName;
            endforeach;
            $Field = "";
            foreach($picturesurl as $Fields):
                $Field .="<input type='hidden' name='pictures[]' value='$Fields' />";
            endforeach;
            return $Field;

        }else{
            return null;
        }
    }
    public function edit(Request $request){
        if(Ad::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.ads.edit',[
                'Ad' => Ad::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=', 0]
                ])->first(),
                'Countries' => Country::get(),
                'Cities' => City::get(),
                'Categories' => Category::get(),
                'SubCategories' => SubCategory::get(),
                'SubSubCategories' => SubSubCategory::get(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        $DATA_TO_UPDATE = array_merge([
            "picture1" => null,
            "picture2" => null,
            "picture3" => null,
            "picture4" => null,
            "picture5" => null,
            "picture6" => null,
            "picture7" => null,
            "picture8" => null,
            "picture9" => null,
            "picture10" => null,
            "picture11" => null,
            "picture12" => null,
            "picture13" => null,
            "picture14" => null,
            "picture15" => null,
            "picture16" => null,
            "picture17" => null,
            "picture18" => null,
            "picture19" => null,
            "picture20" => null,
            "picture21" => null,
            "picture22" => null,
            "picture23" => null,
            "picture24" => null,
            "picture25" => null,
            "picture26" => null,
            "picture27" => null,
            "picture28" => null,
            "picture29" => null,
            "picture30" => null,
        ],$DATA_TO_UPDATE);

        if($request->pictures != null){
            foreach($request->pictures as $K=>$PictureLink):
                if(array_key_exists("picture".($K+1),$DATA_TO_UPDATE)){
                  unset($DATA_TO_UPDATE["picture".($K+1)]);
                }
                $DATA_TO_UPDATE = array_merge(["picture".($K+1) => $PictureLink],$DATA_TO_UPDATE);
            endforeach;
        }
        if($request->id_contact == 1){
            $NameContact = 'البريد الإلكتروني';
        }else{
            $NameContact = 'رقم الجوال';
        }
        $DATA_TO_UPDATE = array_merge([
            'title' => e($request->title),
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
            'fixed' => e($request->fixed),
            'price' => e($request->price),
            'id_contact' => e($request->id_contact),
            'id_currency' => e($request->currency),
            'name_currency' => e(Currency::where([['removed','=',0],['id','=',e($request->currency)]])->first()->symbol),
            'name_contact' => e($NameContact),
            'mazad' => e($request->mazad),
            'status' => e($request->status),
            'valide' => e($request->valide),
            'allow_comments' => e($request->allow_comments),
            'details' => e($request->details),
            'tags' => e($request->tags),
            'banned' => e($request->banned),
        ],$DATA_TO_UPDATE);
        Ad::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('ads'))->with('success',__('تم التعديل بنجاح'));
    }
    public function delete(Request $request){
        if(Ad::where([['id', '=',e($request->id)] ])->count() > 0){
            Ad::where([
                ['id', '=',e($request->id)],
            ])->update([
                'removed' => 1
            ]);
            return redirect()->back()->with('success',__('تم الحذف بنجاح'));
        }else{
            abort(404);
        }
    }
    public function filterdelete(Request $request){
        if(Filter::where([['id', '=',e($request->id)] ])->count() > 0){
            Filter::where([
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
