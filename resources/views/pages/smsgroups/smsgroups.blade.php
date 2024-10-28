@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('مجموعات رسائل الجوال')}}</h1>
</div>
<div class="row rtl">
    @can('create-sms')<div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('أرسل رسائل الجوال') }}</h6>
            </div>
            <div class="card-body">
                @if(session('success_sms'))
                    <div class="alert alert-success">{{e(session('success_sms'))}}</div>
                @endif
                @if(session('error_sms'))
                    <div class="alert alert-danger">{{e(session('error_sms'))}}</div>
                @endif
                <form action="{{ route('sms.send') }}" method="POST">@csrf
                    <div class="form-group col-12">
                        <label for="idusers" class="text-info">{{__('المجموعة')}}</label>
                        <select name="idusers" id="idusers" class="custom-select" required>
                            @foreach ($SmsGroups as $SmsGroup)
                                <option value="{{ e($SmsGroup->id) }}">{{ e($SmsGroup->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="sms" class="text-info">{{ __('الرسالة') }}</label>
                        <textarea class="form-control" id="sms" name="sms" rows="3" placeholder="{{ __('الرسالة') }}" required></textarea>
                    </div>
                    <div class="form-group col-12">
                        <input type="submit" class="btn btn-info mb-2" value="{{__('أرسل')}}">
                    </div>
                </form>
            </div>
        </div>
    </div>@endcan
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('مجموعات رسائل الجوال')}}</h6>
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
                        @can('view-sms-groups')
                        <div class="row p-1 m-1">
                            @can('create-sms-groups')<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 p-1"><a href="{{route('smsgroups.create')}}" class="btn btn-sm btn-info">إضافة مجموعة جديدة</a></div>@endcan
                        </div>
                        @if($CountSmsGroups>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($SmsGroups as $SmsGroup)
                            <tr>
                                <td>{{ e($SmsGroup->name) }}</td>
                                @can('update-sms-groups')<td class="text-center"><a href="{{route('smsgroups.edit', e($SmsGroup->id))}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a></td>@endcan
                                @can('delete-sms-groups')<td class="text-center"><a href="{{route('smsgroups.delete', e($SmsGroup->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan

                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد مجموعات</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
