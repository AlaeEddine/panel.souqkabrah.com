@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('إعلان جديد') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('إعلان جديد')}}</h6>
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
                        @can('create-ads')
                        <form action="{{ route('ads.create.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان الإعلان')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان الإعلان')}}" value="{{old('title')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_country" class="text-info">{{__('الدولة')}}</label>
                                    <select name="id_country" id="id_country" class="custom-select">
                                        @foreach ($Countries as $Country)
                                        <option value="{{ e($Country->id) }}">{{ e($Country->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_city" class="text-info">{{__('اختر المدينة')}}</label>
                                    <select name="id_city" id="id_city" class="custom-select">
                                        @foreach ($Cities as $City)
                                        <option value="{{ e($City->id) }}">{{ e($City->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_category" class="text-info">{{__('اختر السوق')}}</label>
                                    <select name="id_category" id="id_category" class="custom-select">
                                        @foreach ($Categories as $Category)
                                        <option value="{{ e($Category->id) }}"><i class="{{ $Category->icon }}"></i>{{ e($Category->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subcategory" class="text-info">{{__('اختر الفرع')}}</label>
                                    <select name="id_subcategory" id="id_subcategory" class="custom-select">
                                        @foreach ($SubCategories as $SubCategory)
                                        <option value="{{ e($SubCategory->id) }}">{{ e($SubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subsubcategory" class="text-info">{{__('نوع الإعلان')}}</label>
                                    <select name="id_subsubcategory" id="id_subsubcategory" class="custom-select">
                                        @foreach ($SubSubCategories as $SubSubCategory)
                                        <option value="{{ e($SubSubCategory->id) }}">{{ e($SubSubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="fixed" class="text-info">{{__('إعلان مثبث')}}</label>
                                    <select name="fixed" id="fixed" class="custom-select">
                                        <option value="0" selected>{{ __('لا') }}</option>
                                        <option value="1">{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_contact" class="text-info">{{__('وسيلة التواصل')}}</label>
                                    <select name="id_contact" id="id_contact" class="custom-select">
                                        <option value="0" selected>{{ __('رقم الجوال') }}</option>
                                        <option value="1">{{ __('البريد الإلكتروني') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="mazad" class="text-info">{{__('مزاد')}}</label>
                                    <select name="mazad" id="mazad" class="custom-select">
                                        <option value="0" selected>{{ __('لا') }}</option>
                                        <option value="1">{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('الموافقة على الإعلان')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="allow_comments" class="text-info">{{__('إلغاء التعليقات على الإعلان')}}</label>
                                    <select name="allow_comments" id="allow_comments" class="custom-select">
                                        <option value="1" selected>{{ __('لا') }}</option>
                                        <option value="0">{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="tags" class="text-info">{{__('الوسوم')}}</label>
                                    <input type="text" class="form-control" name="tags" id="tags" placeholder="{{__('الوسوم')}}" value="{{old('tags')}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="details" class="text-info">{{ __('تفاصيل الإعلان') }}</label>
                                    <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                </div>
                                <x-upload />
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="banned" class="text-info">{{__('إعلان مخالف')}}</label>
                                <select name="banned" id="banned" class="custom-select">
                                    <option value="0" selected>{{ __('لا') }}</option>
                                    <option value="1">{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('ads.create.submit') }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('ads') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
