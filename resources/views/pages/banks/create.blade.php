@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('حساب بنكي جديد') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('حساب بنكي جديد')}}</h6>
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
                                    <label for="name_1" class="text-info">{{__('اسم الحساب (عربي)')}}</label>
                                    <input type="text" class="form-control" name="name_1" id="name_1" placeholder="{{__('اسم الحساب (عربي)')}}" value="{{old('name_1')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_2" class="text-info">{{__('اسم الحساب (English)')}}</label>
                                    <input type="text" class="form-control" name="name_2" id="name_2" placeholder="{{__('اسم الحساب (English)')}}" value="{{old('name_2')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('مفعل')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('banks.create.submit') }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('banks') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
