@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($SmsGroup->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($SmsGroup->name)}}</h6>
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
                        @can('update-sms-groups')
                        <form action="{{ route('smsgroups.edit.submit', e($SmsGroup->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name" class="text-info">{{__('إسم المجموعة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم المجموعة')}}" value="{{ e($SmsGroup->name) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('المجموعة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($SmsGroup->valide == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($SmsGroup->valide == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <?php
                                    if(strstr($SmsGroup->idusers,',')):
                                        $IDS = explode(",",e($SmsGroup->idusers));
                                    else:
                                        $IDS[] = $SmsGroup->idusers;
                                    endif; ?>
                                    <label for="idusers" class="text-info">{{__('الأعضاء المتوفرين على رقم جوال')}}</label>
                                    <select name="idusers[]" id="idusers" class="custom-select" multiple required>
                                        @foreach ($Users as $User)
                                            <option value="{{ e($User->id) }}" @if($IDS != null)@foreach ($IDS as $id) @if($id == $User->id) selected @endif @endforeach @endif>{{ e($User->name) }}</option>
                                        @endforeach
                                    </select>
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
