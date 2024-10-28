<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentGateway;
class PaymentGatewayController extends Controller
{
    public function paymentgateways(Request $request){
        return view('pages.paymentgateways.paymentgateways',[
            'PaymentGatewaysCount' => PaymentGateway::where([ ['removed', '=',0] ])->count(),
            'PaymentGateways' => PaymentGateway::where([
                ['removed', '=',0]
            ])->get(),
        ]);
    }

    public function edit(Request $request){
        if(PaymentGateway::where([['id', '=',e($request->id)]])->count() > 0){
            return view('pages.paymentgateways.edit',[
                'PaymentGateway' => PaymentGateway::where([
                    ['id', '=',e($request->id)],
                ])->first(),
            ]);
        }else{
            abort(404);
        }
    }
    public function create(Request $request){
        return view('pages.paymentgateways.create');
    }
    public function createsubmit(Request $request){
        $DATA_TO_CREATE = [];
        if(
            strstr($request->name,'paypal') ||
            strstr($request->name,'Paypal') ||
            strstr($request->name,'PayPal') ||
            strstr($request->name,'Pay pal')  ||
            strstr($request->name,'Pay Pal')  ||
            strstr($request->name,'pay pal')  ||
            strstr($request->name,'pay Pal')  ||
            strstr($request->name,'بايبال')   ||
            strstr($request->name,'باي بال')
        ){
            $request->icon = "fab fa-paypal";
        }else{
            $request->icon = "fa fa-building-columns";
        }
        $DATA_TO_CREATE = array_merge([
            'icon' => e($request->icon),
            'name' => e($request->name),
            'description' => e($request->description),
            'sandbox_client_id' => e($request->sandbox_client_id),
            'sandbox_client_secret' => e($request->sandbox_client_secret),
            'sandbox_app_id' => e($request->sandbox_app_id),
            'live_client_id' => e($request->live_client_id),
            'live_client_secret' => e($request->live_client_secret),
            'live_app_id' => e($request->live_app_id),
           /* 'response_callback_ok' => e($request->response_callback_ok),
            'response_callback_nok' => e($request->response_callback_nok),
            'response_callback_unknown' => e($request->response_callback_unknown),
            'checkpoint_url' => e($request->checkpoint_url),
            'api_sandbox' => e($request->api_sandbox),
            'api_port' => e($request->api_port),
            'api_email' => e($request->api_email),
            'api_username' => e($request->api_username),
            'api_password' => e($request->api_password),
            'valide' => e($request->valide),*/
        ],$DATA_TO_CREATE);
        PaymentGateway::insert($DATA_TO_CREATE);
        return redirect(route('paymentgateways'))->with('success',__('تمت الإضافة بنجاح'));
    }
    public function editsubmit(Request $request){
        $DATA_TO_UPDATE = [];
        if(
            strstr($request->name,'paypal') ||
            strstr($request->name,'Paypal') ||
            strstr($request->name,'PayPal') ||
            strstr($request->name,'Pay pal')  ||
            strstr($request->name,'Pay Pal')  ||
            strstr($request->name,'pay pal')  ||
            strstr($request->name,'pay Pal')  ||
            strstr($request->name,'بايبال')   ||
            strstr($request->name,'باي بال')
        ){
            $request->icon = "fab fa-paypal";
        }else{
            $request->icon = "fa fa-building-columns";
        }
        $DATA_TO_UPDATE = array_merge([
            'icon' => e($request->icon),
            'name' => e($request->name),
            'description' => e($request->description),
            'sandbox_client_id' => e($request->sandbox_client_id),
            'sandbox_client_secret' => e($request->sandbox_client_secret),
            'sandbox_app_id' => e($request->sandbox_app_id),
            'live_client_id' => e($request->live_client_id),
            'live_client_secret' => e($request->live_client_secret),
            'live_app_id' => e($request->live_app_id),
           /* 'response_callback_ok' => e($request->response_callback_ok),
            'response_callback_nok' => e($request->response_callback_nok),
            'response_callback_unknown' => e($request->response_callback_unknown),
            'checkpoint_url' => e($request->checkpoint_url),
            'api_sandbox' => e($request->api_sandbox),
            'api_port' => e($request->api_port),
            'api_email' => e($request->api_email),
            'api_username' => e($request->api_username),
            'api_password' => e($request->api_password),
            'valide' => e($request->valide),*/
        ],$DATA_TO_UPDATE);
        PaymentGateway::where([
            ['id', '=',e($request->id)],
        ])->update($DATA_TO_UPDATE);
        return redirect(route('paymentgateways'))->with('success',__('تم التعديل بنجاح'));
    }

    public function delete(Request $request){
        if(PaymentGateway::where([['id', '=',e($request->id)]])->count() > 0){
            PaymentGateway::where([
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
