@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-gauge"></i> {{ __('لوحة التحكم') }}</h1>
</div>
<div class="row text-center">
    @if(session('success'))
        <div class="col-12 alert alert-success">{{e(session('success'))}}</div>
        <p><br></p>
        @endif
    @if(session('error'))
        <div class="col-12 alert alert-danger">{{e(session('error'))}}</div>
        <p><br></p>
        @endif
</div>
<div class="row rtl">
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('ads') }}" class="text-info"><div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('الإعلانات المنتظرة')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Waiting_Ad }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-rocket fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('bannedads') }}" class="text-success"><div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('تبليغات الإعلانات')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Banned_Ad }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bell fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('contact') }}" class="text-danger"><div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('رسائل إتصل بنا')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Contact }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('comments') }}" class="text-warning"><div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('التعليقات')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Comment }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comment fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('bannedcomments') }}" class="text-info"><div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('تبليغات التعليقات')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Banned_Comment }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bug fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('moneytransferts') }}" class="text-success"><div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('التحويلات المالية')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Money_Transfert }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-right-left fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('users') }}" class="text-danger"><div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('العضويات المميزة')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Special_User }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-star fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('blacklist') }}" class="text-warning"><div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('الأعضاء المحظورين')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Banned_User }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ban fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('users') }}" class="text-info"><div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('البريد غير المفعل')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Mail_Not_Enabled }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('users') }}" class="text-success"><div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('الجوال غير المفعل')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Phone_Not_Enabled }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-mobile-button fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('stores') }}" class="text-danger"><div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('متاجر الأعضاء')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Store }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-store fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('banktransferts') }}" class="text-warning"><div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('الحوالات البنكية')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Bank_Transfert }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bank fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('sms') }}" class="text-info"><div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                            <h5>{{__('رصيد رسائل الجوال')}}</h5></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{ $HOME_Sold_SMS }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comment-sms fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div></a>
    </div>

</div>


@endsection
