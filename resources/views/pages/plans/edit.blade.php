@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($Plan->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($Plan->name)}}</h6>
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
                        <form action="{{ route('plans.edit.submit', e($Plan->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم الباقة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم الباقة')}}" value="{{ e($Plan->name) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="price" class="text-info">{{__('السعر')}}</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="{{__('السعر')}}" value="{{ e($Plan->price) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="number" class="text-info">{{__('عدد الرسائل المسموح')}}</label>
                                    <input type="text" class="form-control" name="number" id="number" placeholder="{{__('عدد الرسائل المسموح')}}" value="{{ e($Plan->number) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('الباقة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($Plan->valide ==0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Plan->valide ==1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('plans.edit.submit', e($Plan->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('plans') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
