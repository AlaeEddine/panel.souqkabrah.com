<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SocialMediaController extends Controller
{
    public function socialmedia(Setting $setting){
        return view('pages.socialmedia.socialmedia',[
            'Setting' => $setting->first()
        ]);
    }
    public function socialmediasubmit(Request $request){
        Setting::where([
            ['id', '=',1]
        ])->update([
            'instagram' => e($request->instagram),
            'facebook' => e($request->facebook),
            'twitter' => e($request->twitter),
            'googleplay' => e($request->googleplay),
            'appstore' => e($request->appstore),
            'loginsocialmedia' => e($request->loginsocialmedia),
        ]);
        return redirect()->back()->with('success', __('تم حفظ البيانات بنجاح'));
    }
}
