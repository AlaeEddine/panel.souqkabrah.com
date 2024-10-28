@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('مجموعة جديدة') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('مجموعة جديدة')}}</h6>
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
                        @can('create-sms-groups')
                        <form action="{{ route('smsgroups.create.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم المجموعة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم المجموعة')}}" value="{{old('name')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('المجموعة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="idusers" class="text-info">{{__('الأعضاء المتوفرين على رقم جوال')}}</label>
                                    <select name="idusers[]" id="idusers" class="custom-select" multiple required>
                                        @foreach ($Users as $User)
                                            <option value="{{ e($User->id) }}">{{ e($User->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('smsgroups') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
