@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($MobileData->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($MobileData->name)}}</h6>
            </div>>
            <div class="card-body">
                <div class="container">
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">{{e(session('success'))}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{e(session('error'))}}</div>
                        @endif
                        @can('update-mobile-data')
                        <form action="{{ route('mobiledata.edit.submit', e($MobileData->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم الباقة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم الباقة')}}" value="{{ e($MobileData->name) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="price" class="text-info">{{__('السعر')}}</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="{{__('السعر')}}" value="{{ e($MobileData->price) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="number" class="text-info">{{__('عدد الرسائل المسموح')}}</label>
                                    <input type="text" class="form-control" name="number" id="number" placeholder="{{__('عدد الرسائل المسموح')}}" value="{{ e($MobileData->number) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('الباقة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($MobileData->valide ==0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($MobileData->valide ==1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('mobiledata.edit.submit', e($MobileData->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('mobiledata') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
