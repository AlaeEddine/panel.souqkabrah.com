@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('التحويلات المالية')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('التحويلات المالية')}}</h6>
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
                        @can('view-money-transferts')
                        @if($MoneyTransfertsCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($MoneyTransferts as $MoneyTransfert)
                            <tr>
                                <td>{{ e($MoneyTransfert->name_from) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#MoneyTransfert{{ e($MoneyTransfert->id) }}" role="button" aria-expanded="false" aria-controls="MoneyTransfert{{ e($MoneyTransfert->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                                @can('delete-money-transferts')<td class="text-center"><a href="{{route('moneytransferts.delete', e($MoneyTransfert->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan

                            </tr>
                            <tr>
                                <td colspan="3" class="collapse" id="MoneyTransfert{{ e($MoneyTransfert->id) }}">
                                    <div class="card card-body">
                                        <table>
                                            <tr>
                                                <td>{{ __('السعر') }}</td>
                                                <td>{{ e($MoneyTransfert->price) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('المرسل إليه') }}</td>
                                                <td>@can('update-users')<a href="{{ route('users.edit',e($MoneyTransfert->id_to)) }}">@endif{{ e($MoneyTransfert->name_to) }}@can('update-users')</a>@endcan</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('الإعلان') }}</td>
                                                <td>@can('update-ads')<a href="{{ route('ads.edit',e($MoneyTransfert->id_ads)) }}">@endif{{ e($MoneyTransfert->title_ads) }}@can('update-ads')</a>@endcan</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('التاريخ') }}</td>
                                                <td>{{ e($MoneyTransfert->created_at) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد تحويلات مالية</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
