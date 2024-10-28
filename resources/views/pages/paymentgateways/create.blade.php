@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('بوابة دفع جديدة') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('بوابة دفع جديدة')}}</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">{{e(session('success'))}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{e(session('error'))}}</div>
                        @endif
                        @can('create-payment-gateways')
                        <form action="{{ route('paymentgateways.create.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم الشركة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم الشركة')}}" value="{{old('name')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="description" class="text-info">{{__('وصف الشركة')}}</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="{{__('وصف الشركة')}}" value="{{old('description')}}">
                                </div>
                            </div>
                            <h2>الحساب</h2>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="live_client_id" class="text-info">{{__('Client ID')}}</label>
                                    <input type="text" class="form-control" name="live_client_id" id="live_client_id" placeholder="{{__('Client ID')}}" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="live_client_secret" class="text-info">{{__('Client SECRET')}}</label>
                                    <input type="text" class="form-control" name="live_client_secret" id="live_client_secret" placeholder="{{__('Client SECRET')}}" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="live_app_id" class="text-info">{{__('APP ID')}}</label>
                                    <input type="text" class="form-control" name="live_app_id" id="live_app_id" placeholder="{{__('APP ID')}}" value="{{old('description')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('تفعيل البوابة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            </div>
                            <h2 class="d-none">الحساب التجريبي - SandBox</h2>
                            <div class="row d-none">
                                <div class="form-group col-md-6 col-12">
                                    <label for="sandbox_client_id" class="text-info">{{__('Client ID')}}</label>
                                    <input type="text" class="form-control" name="sandbox_client_id" id="sandbox_client_id" placeholder="{{__('Client ID')}}" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="sandbox_client_secret" class="text-info">{{__('Client SECRET')}}</label>
                                    <input type="text" class="form-control" name="sandbox_client_secret" id="sandbox_client_secret" placeholder="{{__('Client SECRET')}}" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="sandbox_app_id" class="text-info">{{__('APP ID')}}</label>
                                    <input type="text" class="form-control" name="sandbox_app_id" id="sandbox_app_id" placeholder="{{__('APP ID')}}" value="{{old('description')}}">
                                </div>

                                <div class="form-group col-md-6 col-12 d-none">
                                    <label for="response_callback_ok" class="text-info">{{__('رابط قبول الدفع')}}</label>
                                    <input type="text" class="form-control" name="response_callback_ok" id="response_callback_ok" placeholder="{{__('رابط قبول الدفع')}}" value="{{old('response_callback_ok')}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('paymentgateways.create.submit') }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('paymentgateways') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
