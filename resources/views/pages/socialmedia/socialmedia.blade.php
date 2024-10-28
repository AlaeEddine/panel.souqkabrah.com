@canany(['view-social-media','update-social-media'], $Setting)
@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('مواقع التواصل')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('مواقع التواصل')}}</h6>
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
                    </div>
                    <form action="{{route('socialmedia.submit')}}" method="POST">
                        @csrf
                       <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="instagram" class="text-info">{{__('رابط صفحة إنستقرام')}}</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="{{__('رابط صفحة إنستقرام')}}" value="{{e($Setting->instagram)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="facebook" class="text-info">{{__('رابط صفحة الفيسبوك')}}</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="{{__('رابط صفحة الفيسبوك')}}" value="{{e($Setting->facebook)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="twitter" class="text-info">{{__('رابط صفحة تويتر')}}</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="{{__('رابط صفحة تويتر')}}" value="{{e($Setting->twitter)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="googleplay" class="text-info">{{__('رابط تطبيق جوجل بلاي')}}</label>
                                <input type="text" class="form-control" name="googleplay" id="googleplay" placeholder="{{__('رابط تطبيق جوجل بلاي')}}" value="{{e($Setting->googleplay)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="appstore" class="text-info">{{__('رابط تطبيق آبل ستور')}}</label>
                                <input type="text" class="form-control" name="appstore" id="appstore" placeholder="{{__('رابط تطبيق آبل ستور')}}" value="{{e($Setting->appstore)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="loginsocialmedia" class="text-info">{{__('تسجيل الدخول بواسطة مواقع التواصل')}}</label>
                                <select name="loginsocialmedia" class="form-control" id="loginsocialmedia">
                                    <option @if($Setting->loginsocialmedia == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->loginsocialmedia == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            @can('update-social-media', $Setting)
                            <div class="form-group col-md-6 col-12">
                                <button type="submit" class="btn btn-primary mb-2">{{__('حفظ البيانات')}}</button>
                            </div>
                            @endcan
                       </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@endcanany
