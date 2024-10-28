<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Setting;
use App\Models\Ad;
use App\Models\MoneyTransfert;
use App\Models\BankTransfert;
use App\Models\Store;
use App\Models\Contact;
use App\Models\Comment;


class SettingController extends Controller{

    public function settings(Setting $setting){
        return view('pages.settings.settings',[
            'Setting' => $setting->first()
        ]);
    }
    public function settingssubmit(Request $request){
        Setting::where([
            ['id', '=',1]
        ])->update([
            'url' => e($request->url),
            'title' => e($request->title),
            'title2' => e($request->title2),
            'meta' => e($request->meta),
            'tags' => e($request->tags),
            'intro' => e($request->intro),
            'emailadmin' => e($request->emailadmin),
            'mobileadmin' => e($request->mobileadmin),
            'smtp' => e($request->smtp),
            'smtpport' => e($request->smtpport),
            'ssltls' => e($request->ssltls),
            'emailresponse' => e($request->emailresponse),
            'passwordemailresponse' => e($request->passwordemailresponse),
            'copyright' => e($request->copyright),
            'description' => e($request->description),
            'msgclose' => e($request->msgclose),
            'header' => $request->header,
            'footer' => $request->footer,
            'enableotp' => e($request->enableotp),
            'msgaddproductstatus' => e($request->msgaddproductstatus),
            'msgaddproduct' => e($request->msgaddproduct),
            'msgactivationmobile' => e($request->msgactivationmobile),
            'advice' => e($request->advice),
            'ipapi' => e($request->ipapi),
            'timeadnoregister' => e($request->timeadnoregister),
            'timeadregister' => e($request->timeadregister),
            'numberadsspecialuser' => e($request->numberadsspecialuser),
            'conditionnumberadsspecialuser' => e($request->conditionnumberadsspecialuser),
            'conditionpayedads' => e($request->conditionpayedads),
            'conditionpayedadscategories' => $request->conditionpayedadscategories,
            'anonymousad' => e($request->anonymousad),
            'showadanonymous' => e($request->showadanonymous),
            'showadusers' => e($request->showadusers),
            'showstoreusers' => e($request->showstoreusers),
            'showcomments' => e($request->showcomments),
            'removecommentonlyspecial' => e($request->removecommentonlyspecial),
            'republishspecialonly' => e($request->republishspecialonly),
            'allowfilter' => e($request->allowfilter),
            'allowslider' => e($request->allowslider),
            'allowmobilepack' => e($request->allowmobilepack),
            'allowsms' => e($request->allowsms),
            'apn' => e($request->apn),
            'apnuser' => e($request->apnuser),
            'apnpassword' => e($request->apnpassword),
            'apnname' => e($request->apnname),
            'forceactivatemobile' => e($request->forceactivatemobile),
            'nbrtentativemobile' => e($request->nbrtentativemobile),
            'nbrfreesms' => e($request->nbrfreesms),
            'nbrcategoriesmobile' => e($request->nbrcategoriesmobile),
            'forceactivateemail' => e($request->forceactivateemail),
            'allowcash' => e($request->allowcash),
            'commission' => e($request->commission),
            'commissionvalue' => e($request->commissionvalue),
            'googlemapskey' => e($request->googlemapskey),
            'instagram' => e($request->instagram),
            'facebook' => e($request->facebook),
            'twitter' => e($request->twitter),
            'googleplay' => e($request->googleplay),
            'appstore' => e($request->appstore),
            'loginsocialmedia' => e($request->loginsocialmedia),
            'paymentgateways' => e($request->paymentgateways),
            'enabletags' => e($request->enabletags),
            'recaptcha' => e($request->recaptcha),
            'recaptchasitekey' => e($request->recaptchasitekey),
            'recaptchasecretkey' => e($request->recaptchasecretkey),
        ]);
        return redirect()->back()->with('success', __('تم حفظ البيانات بنجاح'));
    }
    public function dashboard(){
        return view('dashboard',[
            'HOME_Waiting_Ad' => Ad::where([ ['valide','=','-1'], ['removed','=' ,0] ])->count(),
            'HOME_Banned_Ad' => Ad::where([ ['banned','=','-1'], ['removed','=' ,0] ])->count(),
            'HOME_Contact' => Contact::where([ ['removed','=' ,0] ])->count(),
            'HOME_Comment' => Comment::where([ ['removed','=' ,0] ])->count(),
            'HOME_Banned_Comment' => Comment::where([ ['banned','=','-1'], ['removed','=' ,0] ])->count(),
            'HOME_Money_Transfert' => MoneyTransfert::where([ ['removed','=' ,0] ])->count(),
            'HOME_Special_User' => User::where([ ['special_user','=',1], ['removed','=' ,0] ])->count(),
            'HOME_Banned_User' => User::where([ ['banned','=','-1'], ['removed','=' ,0] ])->count(),
            'HOME_Mail_Not_Enabled' => User::where([ ['email_enabled','=',0], ['removed','=' ,0] ])->count(),
            'HOME_Phone_Not_Enabled' => User::where([ ['phone_enabled','=',0], ['removed','=' ,0] ])->count(),
            'HOME_Store' => Store::where([ ['removed','=' ,0] ])->count(),
            'HOME_Bank_Transfert' => BankTransfert::where([ ['removed','=' ,0] ])->count(),
            'HOME_Sold_SMS' => '0', // Get data from API SMS Gateway
        ]);
    }
}
