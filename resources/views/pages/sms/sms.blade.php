@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('رسائل جوال الأعضاء')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('رسائل جوال الأعضاء')}}</h6>
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
                        @can('view-sms')
                        @if($CountSms>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Smses as $Sms)
                            <tr>
                                <td>{{ e($Sms->sms) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#Sms{{ e($Sms->id) }}" role="button" aria-expanded="false" aria-controls="Sms{{ e($Sms->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                                @can('delete-sms')<td class="text-center"><a href="{{route('sms.delete', e($Sms->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan
                            </tr>
                            <tr>
                                <td colspan="3" class="collapse" id="Sms{{ e($Sms->id) }}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <table class="table">
                                                <tr>
                                                    <td>{{ __('المرسل') }}</td>
                                                    <td>@can('update-users')<a href="{{ route('users.edit',$Sms->id_from) }}">@endcan{{ e($Sms->name_from) }}@can('update-users')</a>@endcan</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('رقم المرسل') }}</td>
                                                    <td>{{ e($Sms->phone_from) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('المرسل إليه') }}</td>
                                                    <td>@can('update-users')<a href="{{ route('users.edit',$Sms->id_to) }}">@endcan{{ e($Sms->name_to) }}@can('update-users')</a>@endcan</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('رقم المرسل إليه') }}</td>
                                                    <td>{{ e($Sms->phone_to) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('تاريخ الإرسال') }}</td>
                                                    <td>{{ e($Sms->created_at) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد رسائل جوال مرسلة بين الأعضاء</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
