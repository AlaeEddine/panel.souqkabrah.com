@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('التحويلات البنكية')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('التحويلات البنكية')}}</h6>
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
                        @can('view-bank-transferts')
                        @if($BankTransfertsCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($BankTransferts as $BankTransfert)
                            <tr>
                                <td>{{ e($BankTransfert->name_from) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#BankTransfert{{ e($BankTransfert->id) }}" role="button" aria-expanded="false" aria-controls="BankTransfert{{ e($BankTransfert->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                                @can('delete-bank-transferts')<td class="text-center"><a href="{{route('banktransferts.delete', e($BankTransfert->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan
                            </tr>
                            <tr>
                                <td colspan="3" class="collapse" id="BankTransfert{{ e($BankTransfert->id) }}">
                                    <div class="card card-body">
                                        <table>
                                            <tr>
                                                <td>{{ __('حساب المرسل') }}</td>
                                                <td>{{ e($BankTransfert->account_from) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('السعر') }}</td>
                                                <td>{{ e($BankTransfert->price) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('المرسل إليه') }}</td>
                                                <td>@can('update-users')<a href="{{ route('users.edit',e($BankTransfert->id_to)) }}">@endif{{ e($BankTransfert->name_to) }}@can('update-users')</a>@endcan</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('حساب المرسل إليه') }}</td>
                                                <td>{{ e($BankTransfert->account_to) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('الإعلان') }}</td>
                                                <td>@can('update-ads')<a href="{{ route('ads.edit',e($BankTransfert->id_ads)) }}">@endif{{ e($BankTransfert->title_ads) }}@can('update-ads')</a>@endcan</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('التاريخ') }}</td>
                                                <td>{{ e($BankTransfert->created_at) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد تحويلات بنكية</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
