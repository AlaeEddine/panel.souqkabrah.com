<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    public function banners(Request $request){
        return view('pages.banners.banners',[
            'CountBanners' => Banner::where([
                ['removed', '=',0]
            ])->count(),
            'Banners' => Banner::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }
    public function create(Request $request){
        return view('pages.banners.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_INSERT = [];
        if($request->pictures != null){
            foreach($request->pictures as $K=>$PictureLink):
                $DATA_TO_INSERT = array_merge(["picture".($K+1) => $PictureLink],$DATA_TO_INSERT);
            endforeach;
        }
        if($request->date_start != null): $request->date_start = date('Y-m-d H:i:s', strtotime($request->date_start)); else: $request->date_start = null; endif;
        if($request->date_end != null): $request->date_end = date('Y-m-d H:i:s', strtotime($request->date_end)); else: $request->date_end = null; endif;
        $DATA_TO_INSERT = array_merge([
            'title' => e($request->title),
            'description' => e($request->description),
            'position' => e($request->position),
            'date_start' => e($request->date_start),
            'date_end' => e($request->date_end),
            'valide' => e($request->valide),
        ],$DATA_TO_INSERT);
        Banner::insert($DATA_TO_INSERT);
        return redirect(route('banners'))->with('success',__('تمت الإضافة بنجاح'));
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
                $destinationPath = '../../www.opensook.ma/public/uploads/banners/';
                $file->move($destinationPath, $fileName);
                $picturesurl[$k] = '/uploads/banners/'.$fileName;
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
        if(Banner::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.banners.edit',[
                'Banner' => Banner::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=', 0]
                ])->first(),
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
        ],$DATA_TO_UPDATE);

        if($request->pictures != null){
            foreach($request->pictures as $K=>$PictureLink):
                if(array_key_exists("picture".($K+1),$DATA_TO_UPDATE)){
                  unset($DATA_TO_UPDATE["picture".($K+1)]);
                }
                $DATA_TO_UPDATE = array_merge(["picture".($K+1) => $PictureLink],$DATA_TO_UPDATE);
            endforeach;
        }
        if($request->date_start != null): $request->date_start = date('Y-m-d H:i:s', strtotime($request->date_start)); else: $request->date_start = null; endif;
        if($request->date_end != null): $request->date_end = date('Y-m-d H:i:s', strtotime($request->date_end)); else: $request->date_end = null; endif;
        $DATA_TO_UPDATE = array_merge([
            'title' => e($request->title),
            'description' => e($request->description),
            'position' => e($request->position),
            'date_start' => e($request->date_start),
            'date_end' => e($request->date_end),
            'valide' => e($request->valide),
        ],$DATA_TO_UPDATE);
        Banner::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('banners'))->with('success',__('تم التعديل بنجاح'));
    }


    public function delete(Request $request){
        if(Banner::where([['id', '=',e($request->id)] ])->count() > 0){
            Banner::where([
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
