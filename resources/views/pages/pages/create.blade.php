@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('صفحة جديدة') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('صفحة جديدة')}}</h6>
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
                        @can('create-pages')
                        <form action="{{ route('pages.create.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان الصفحة')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان الصفحة')}}" value="{{old('title')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="url" class="text-info">{{__('رابط الصفحة')}}</label>
                                    <input type="text" class="form-control" name="url" id="url" placeholder="{{__('رابط الصفحة')}}" value="{{old('url')}}">
                                </div>
                                <div class="form-group col-12 ltr">
                                    <label for="html" class="text-info">{{ __('كود HTML') }}</label>
                                    <textarea class="form-control" id="html" placeholder="{{ __('كود HTML') }}" name="html" rows="3">{!! old('html') !!}</textarea>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('صفحة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                        </div>

                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('pages.create.submit') }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('pages') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
