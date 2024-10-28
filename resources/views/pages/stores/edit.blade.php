@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($Store->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($Store->name)}}</h6>
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
                        @can('update-stores')
                        <form action="{{ route('stores.edit.submit', e($Store->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم المتجر')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم المتجر')}}" value="{{e($Store->name)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_country" class="text-info">{{__('الدولة')}}</label>
                                    <select name="id_country" id="id_country" class="custom-select">
                                        @foreach ($Countries as $Country)
                                        <option value="{{ e($Country->id) }}" @if($Store->id_country == $Country->id) selected @endif>{{ e($Country->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_city" class="text-info">{{__('اختر المدينة')}}</label>
                                    <select name="id_city" id="id_city" class="custom-select">
                                        @foreach ($Cities as $City)
                                        <option value="{{ e($City->id) }}" @if($Store->id_city == $City->id) selected @endif>{{ e($City->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_category" class="text-info">{{__('اختر السوق')}}</label>
                                    <select name="id_category" id="id_category" class="custom-select">
                                        @foreach ($Categories as $Category)
                                        <option value="{{ e($Category->id) }}" @if($Store->id_category == $Category->id) selected @endif><i class="{{ $Category->icon }}"></i>{{ e($Category->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subcategory" class="text-info">{{__('اختر الفرع')}}</label>
                                    <select name="id_subcategory" id="id_subcategory" class="custom-select">
                                        @foreach ($SubCategories as $SubCategory)
                                        <option value="{{ e($SubCategory->id) }}" @if($Store->id_subcategory == $SubCategory->id) selected @endif>{{ e($SubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subsubcategory" class="text-info">{{__('نوع المتجر')}}</label>
                                    <select name="id_subsubcategory" id="id_subsubcategory" class="custom-select">
                                        @foreach ($SubSubCategories as $SubSubCategory)
                                        <option value="{{ e($SubSubCategory->id) }}" @if($Store->id_subsubcategory == $SubSubCategory->id) selected @endif>{{ e($SubSubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description" class="text-info">{{ __('نبذة عن المتجر') }}</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ e($Store->description) }}</textarea>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="special" class="text-info">{{__('متجر مميز')}}</label>
                                    <select name="special" id="special" class="custom-select">
                                        <option value="0" @if($Store->special == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Store->special == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="archived" class="text-info">{{__('مؤرشف')}}</label>
                                    <select name="archived" id="archived" class="custom-select">
                                        <option value="0" @if($Store->archived == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Store->archived == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('الموافقة على الإعلان')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($Store->valide == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Store->valide == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="banned" class="text-info">{{__('متجر مخالف')}}</label>
                                <select name="banned" id="banned" class="custom-select">
                                    <option value="0" @if($Store->banned == 0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($Store->banned == 1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('stores.edit.submit', e($Store->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('stores') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
