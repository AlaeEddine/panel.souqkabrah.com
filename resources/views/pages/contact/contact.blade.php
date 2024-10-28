@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-envelope"></i> {{__('رسائل إتصل بنا')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-envelope"></i> {{__('رسائل إتصل بنا')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <br>
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">{{e(session('success'))}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{e(session('error'))}}</div>
                        @endif
                        @if($ContactCount >0)
                        <table class="table table-bordered table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th>{{__('الإسم')}}</th>
                                    <th>{{__('رقم الموبايل')}}</th>
                                    <th>{{__('البريد الإلكتروني')}}</th>
                                    <th>{{__('السبب')}}</th>
                                    <th>{{__('التفاصيل')}}</th>
                                    <th>{{__('التاريخ')}}</th>
                                    @can('delete-contact')<th>{{__('حذف')}}</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Contacts as $Contact)
                                <tr>
                                    <td>{{e($Contact->name)}}</td>
                                    <td>{{e($Contact->mobile)}}</td>
                                    <td>{{e($Contact->email)}}</td>
                                    <td>{{e($Contact->subject)}}</td>
                                    <td>{{e($Contact->details)}}</td>
                                    <td>{{e($Contact->created_at->format('y-m-d'))}} - {{e($Contact->created_at->format('H:i:s'))}}</td>
                                    @can('delete-contact')<td class="text-center"><a href="{{route('contact.delete',[e($Contact->id)])}}" class="text-danger"><i class="fa fa-trash"></i></a></td>@endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-primary"><i class="fa fa-info-circle"></i> {{__('لا توجد رسائل')}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
