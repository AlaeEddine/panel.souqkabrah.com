@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('لائحة المتاجر')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('لائحة المتاجر')}}</h6>
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
                        @can('view-stores')
                        @if($StoresCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Stores as $Store)
                            <tr>
                                <td>{{ e($Store->name) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#Store{{ e($Store->id) }}" role="button" aria-expanded="false" aria-controls="Store{{ e($Store->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="collapse" id="Store{{ e($Store->id) }}">
                                    <div class="card card-body">
                                        <table>
                                            <tr>
                                                @can('delete-stores') <td class="text-center"><a href="{{route('stores.delete', e($Store->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan
                                                @can('update-stores') <td class="text-center"><a href="{{route('stores.edit', e($Store->id))}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a></td>@endcan
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="alert alert-warning">{{ e($Store->description) }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('رقم المتجر') }}</td>
                                                <td>{{ e($Store->id) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('مميز') }}</td>
                                                <td>@if($Store->special == 1) {{ __('نعم') }} @else {{ __('لا') }} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('القسم') }}</td>
                                                <td>{{ e($Store->name_category) }} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('مؤرشف') }}</td>
                                                <td>@if($Store->archived == 1) {{ __('نعم') }} @else {{ __('لا') }} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('صاحب المتجر') }}</td>
                                                <td> @can('update-users')<a href="{{ route('users.edit',e($Store->id_owner)) }}">@endcan{{ e($Store->name_owner) }}@can('update-users')</a>@endcan</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('البريد') }}</td>
                                                <td>@if($Store->email_owner != null){{ e($Store->email_owner) }}@else {{ __('لا يوجد') }} @endif</td>
                                            </tr>
                                            @if($Store->email_owner != null)<tr>
                                                <td colspan="2"><a href="" class="btn btn-info">{{ __('إرسال بريد') }}</a></td>
                                            </tr>@endif
                                            <tr>
                                                <td>{{ __('رقم الجوال') }}</td>
                                                <td>@if($Store->mobile_owner != null){{ e($Store->mobile_owner) }}@else {{ __('لا يوجد') }} @endif</td>
                                            </tr>
                                            @if($Store->mobile_owner != null)<tr>
                                                <td colspan="2"><a href="" class="btn btn-info">{{ __('إرسال رسالة للجوال') }}</a></td>
                                            </tr>@endif
                                            <tr>
                                                <td>{{ __('المدينة') }}</td>
                                                <td>{{ e($Store->name_city) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('تاريخ الإضافة') }}</td>
                                                <td>{{ e($Store->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('واتس') }}</td>
                                                <td><a href="https://wa.me/{{ e($Store->whatsapp_owner) }}">{{ e($Store->whatsapp_owner) }}</a></td>
                                            </tr>

                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد متاجر</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
