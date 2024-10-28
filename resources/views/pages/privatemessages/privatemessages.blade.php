@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('الرسائل الخاصة للأعضاء')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('الرسائل الخاصة للأعضاء')}}</h6>
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
                        @if($PrivateMessagesCount >0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($PrivateMessages as $PrivateMessage)
                            <tr>
                                <td>{{ e($PrivateMessage->message) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#PrivateMessage{{ e($PrivateMessage->id) }}" role="button" aria-expanded="false" aria-controls="PrivateMessage{{ e($PrivateMessage->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="collapse" id="PrivateMessage{{ e($PrivateMessage->id) }}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <table class="table">
                                                <tr>
                                                    <td>{{ __('رقم جوال المرسل') }}</td>
                                                    <td>{{ e($PrivateMessage->phone_from) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><a href="{{ route('sms.create',e($PrivateMessage->phone_from)) }}" class="btn btn-sm btn-primary">إرسال رسالة جوال</a></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('رقم جوال المرسل إليه') }}</td>
                                                    <td>{{ e($PrivateMessage->phone_to) }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><a href="{{ route('sms.create',e($PrivateMessage->phone_to)) }}" class="btn btn-sm btn-primary">إرسال رسالة جوال</a></td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الإرسال</td>
                                                    <td>{{ e($PrivateMessage->created_at) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>المرسل</td>
                                                    <td><a href="{{ route('users.edit',e($PrivateMessage->id_from)) }}">{{ e($PrivateMessage->name_from) }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td>المرسل حذفها</td>
                                                    <td>@if($PrivateMessage->removed_by_from == 0) {{ __('لا') }} @else {{ __('نعم') }} @endif</td>
                                                </tr>

                                                <tr>
                                                    <td>المرسل إليه</td>
                                                    <td><a href="{{ route('users.edit',e($PrivateMessage->id_to)) }}">{{ e($PrivateMessage->name_to) }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td>المرسل إليه حذفها</td>
                                                    <td>@if($PrivateMessage->removed_by_to == 0) {{ __('لا') }} @else {{ __('نعم') }} @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>المرسل إليه شاهدها</td>
                                                    <td>@if($PrivateMessage->vu == 0) {{ __('لا') }} @else {{ __('نعم') }} @endif</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            <tr>
                            @endforeach
                        </table>
                        @else
                            <div class="alert alert-info">{{__('لا يوجد رسائل')}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
