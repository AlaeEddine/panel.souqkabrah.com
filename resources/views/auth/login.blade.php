@extends('layouts.guest')
@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />
<div class="row bg-white">
    <div class="col-lg-6 d-none d-lg-block bg-login-image vh-100"></div>
    <div class="col-lg-6 p-5">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-gauge"></i> {{__('لوحة التحكم')}}</h1>
            </div>
            <form class="user" novalidate="novalidate" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user ltr @if($errors->has('email') || request()->session()->has('error')) is-invalid @endif"
                        id="exampleInputEmail" aria-describedby="email" name="email"
                        placeholder="{{__('البريد الإلكتروني')}}" value="{{old('email','email@domain.com')}}" autocomplete="off" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user ltr @if($errors->has('email') || $errors->has('password') || request()->session()->has('error')) is-invalid @endif"
                        id="exampleInputPassword" name="password" value="{{old('password')}}" placeholder="{{__('كلمة المرور')}}" autocomplete="off" />
                </div>
                @if($errors->has('password'))
                    @foreach ($errors->get('password') as $error)
                    <p class="text-danger text-center"><i class="fa fa-circle-exclamation text-danger"></i> {{ $error }}</p>
                    <br>
                    @endforeach
                @endif
                @if($errors->has('email'))
                    @foreach ($errors->get('email') as $error)
                    <p class="text-danger text-center"><i class="fa fa-circle-exclamation text-danger"></i> {{ $error }}</p>
                    <br>
                    @endforeach
                @endif
                @if(request()->session()->has('error'))
                    <p class="text-danger text-center"><i class="fa fa-circle-exclamation text-danger"></i>  {{ request()->session()->get('error') }}</p>
                    <br>
                @endif
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">{{__('تذكرني')}}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                   <i class="fa fa-lock"></i> {{__('تسجيل الدخول')}}
                </button>
        </div>
    </div>
</div>
@endsection
