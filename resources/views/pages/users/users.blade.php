@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('لائحة الأعضاء')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('لائحة الأعضاء')}}</h6>
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
                        @can('view-users')
                        <table class="table table-bordered table-hover table-stripped" id="myTable">
                            <thead>
                                <tr>
                                    <th>العضو</th>
                                    <th>التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Users as $User)
                            <tr>
                                <td>{{ e($User->name) }}
                                    <div class="collapse" id="User{{ e($User->id) }}">
                                        <div class="card card-body">
                                            <div class="row">
                                                @can('delete-users')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('users.delete', e($User->id))}}" class="btn btn-sm btn-info">حذف</a></div>@endcan
                                                @can('update-users')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('users.edit', e($User->id))}}" class="btn btn-sm btn-info">تعديل</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('ads') }}" class="btn btn-sm btn-info">الإعلانات</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('moneytransferts') }}" class="btn btn-sm btn-info">التحويلات المالية</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('banktransferts') }}" class="btn btn-sm btn-info">التحويلات البنكية</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('comments') }}" class="btn btn-sm btn-info">التعليقات</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('comments') }}" class="btn btn-sm btn-info">الردود</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('sms') }}" class="btn btn-sm btn-info">رسائل الجوال الصادرة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('sms') }}" class="btn btn-sm btn-info">رسائل الجوال الواردة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('stores') }}" class="btn btn-sm btn-info">المتجر</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('privatemessages') }}" class="btn btn-sm btn-info">الرسائل الخاصة الصادرة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('privatemessages') }}" class="btn btn-sm btn-info">الرسائل الخاصة الواردة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('ratings') }}" class="btn btn-sm btn-info">التقييمات</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('likes') }}" class="btn btn-sm btn-info">قائمة المفضلة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('likers') }}" class="btn btn-sm btn-info">قائمة المتابعين</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('categories.liked') }}" class="btn btn-sm btn-info">الأقسام المتابعة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('users.enable.email',e($User->id)) }}" class="btn btn-sm btn-info">تفعيل البريد</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('users.enable.mobile',e($User->id)) }}" class="btn btn-sm btn-info">تفعيل الجوال</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="" class="btn btn-sm btn-info">عضوية مميزة لمدة شهر</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="" class="btn btn-sm btn-info">إلغاء العضوية المميزة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('users.ban',e($User->id)) }}" class="btn btn-sm btn-info">حظر العضو</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('users.unban',e($User->id)) }}" class="btn btn-sm btn-info">إلغاء حظر العضو</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('moneytransferts') }}" class="btn btn-sm btn-info">دفع عمولة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('moneytransferts') }}" class="btn btn-sm btn-info">دفع أكثر من عمولة</a></div>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{ route('moneytransferts') }}" class="btn btn-sm btn-info">إلغاء العمولة</a></div>@endcan
                                            </div>
                                            <div class="row">
                                                <div class="col-6">رقم العضوية</div>
                                                <div class="col-6">{{ e($User->id) }}</div>
                                                <div class="col-6">نوع العضوية</div>
                                                <div class="col-6">{{ e($User->role) }}</div>
                                                <div class="col-6">رقم الجوال</div>
                                                <div class="col-6">{{ e($User->phone) }}</div>
                                                <div class="col-6">البريد الإلكتروني</div>
                                                <div class="col-6">{{ e($User->email) }}</div>
                                                <div class="col-6">طريقة الإشتراك</div>
                                                <div class="col-6">@if($User->plan != null){{ e($User->plan) }}@else{{ __('الإشتراك العادي') }}@endif</div>
                                                <div class="col-6">عدد محاولات تفعيل الجوال</div>
                                                <div class="col-6">@if($User->attempts_validation_mobile !=null){{ e($User->attempts_validation_mobile) }}@else 0 @endif</div>
                                                <div class="col-6">الجوال مفعل</div>
                                                <div class="col-6">@if($User->phone_enabled == 1) {{ __('نعم') }} @else {{ __('لا') }} @endif</div>
                                                <div class="col-6">البريد مفعل</div>
                                                <div class="col-6">@if($User->email_enabled == 1) {{ __('نعم') }} @else {{ __('لا') }} @endif</div>
                                                <div class="col-6">كود تفعيل الجوال</div>
                                                <div class="col-6">{{ e($User->phone_code) }}</div>
                                                <div class="col-6">كود تفعيل البريد</div>
                                                <div class="col-6">{{ e($User->email_code) }}</div>
                                                <div class="col-6">رصيد الجوال</div>
                                                <div class="col-6">@if($User->phone_sold != null){{ e($User->phone_sold) }}@else 0 @endif</div>
                                                <div class="col-6">تاريخ الإشتراك</div>
                                                <div class="col-6">{{ e($User->created_at) }}</div>
                                                <div class="col-6">تاريخ آخر نشاط</div>
                                                <div class="col-6">{{ e($User->updated_at) }}</div>
                                                <div class="col-6">العمولة</div>
                                                <div class="col-6">@if($User->commission != null){{ e($User->commission) }}@else{{ __('لم يتم دفع عمولة')  }}@endif</div>

                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#User{{ e($User->id) }}" role="button" aria-expanded="false" aria-controls="User{{ e($User->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
