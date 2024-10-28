@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ e($User->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{e($User->name)}}</h6>
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
                        @can('update-users')
                        <form action="{{ route('users.edit.submit',e(request('id'))) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم العضو')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم العضو')}}" value="{{e($User->name)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone" class="text-info">{{__('رقم الهاتف')}}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('رقم الهاتف')}}" value="{{e($User->phone)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="email" class="text-info">{{__('البريد الإلكتروني')}}</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="{{__('البريد الإلكتروني')}}" value="{{e($User->email)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="banned" class="text-info">{{__('في اللائحة السوداء')}}</label>
                                    <select name="banned" id="banned" class="custom-select">
                                        <option value="0" @if($User->banned == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($User->banned == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <button type="submit" class="btn btn-primary mb-2">{{__('حفظ البيانات')}}</button>
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('users') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
