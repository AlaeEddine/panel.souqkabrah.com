@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ e($City->name_ar) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{e($City->name_ar)}}</h6>
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
                        @can('update-cities')
                        <form action="{{ route('cities.edit.submit',e(request('id'))) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_ar" class="text-info">{{__('إسم المدينة (عربي)')}}</label>
                                    <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="{{__('إسم المدينة (عربي)')}}" value="{{e($City->name_ar)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_en" class="text-info">{{__('إسم المدينة (إنجليزي)')}}</label>
                                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="{{__('إسم المدينة (إنجليزي)')}}" value="{{e($City->name_en)}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <button type="submit" class="btn btn-primary mb-2">{{__('حفظ البيانات')}}</button>
                            </div>
                        </form>
                        <p><br></p>
                        <center><a href="{{ route('cities') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
