<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function ratings(Rating $Ratings){
        return view('pages.ratings.ratings',[
            'RatingCount' => Rating::where([
                ['removed', '=',0]
            ])->count(),
            'Ratings' => $Ratings->where('removed',0)->get()
        ]);
    }
    public function edit(Request $request){
        if(Rating::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            return view('pages.ratings.edit',[
                'Rating' => Rating::where([
                    ['id', '=',e($request->id)],
                    ['removed', '=',0]
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if(Rating::where([['id', '=',e($request->id)],['removed', '=',0]])->count() > 0){
            Rating::where([
                ['id', '=',e($request->id)],
                ['removed', '=',0]
            ])->update([
                'rating_name' => e($request->rating_name),
                'rating_value' => e($request->rating_value),
            ]);
            return redirect(route('ratings'))->with('success',__('تم التعديل بنجاح'));
        }else{
            abort(404);
        }
    }
    public function delete(Request $request){
        if(Rating::where([['id', '=',e($request->id)]])->count() > 0){
            Rating::where([
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
