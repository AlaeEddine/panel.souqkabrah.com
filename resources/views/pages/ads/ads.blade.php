@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('لائحة الإعلانات')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('لائحة الإعلانات')}}</h6>
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
                        @can('view-ads')
                        @can('create-ads')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('ads.create')}}" class="btn btn-sm btn-info">إعلان جديد</a></div>@endcan
                        @if($CountAds>0)
                        <table class="table table-bordered table-hover table-stripped" id="myTable">
                            <thead>
                                <tr>
                                    <th>الإعلان</th>
                                    <th>التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($Ads as $Ad)
                            <tr>
                                <td>{{ e($Ad->title) }}
                                <div class="collapse" id="User{{ e($Ad->id) }}">
                                    <div class="card card-body">
                                        <div class="row">
                                            @can('delete-ads')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('ads.delete', e($Ad->id))}}" class="btn btn-sm btn-info">حذف</a></div>@endcan
                                            @can('update-ads')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('ads.edit', e($Ad->id))}}" class="btn btn-sm btn-info">تعديل</a></div>@endcan
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="" class="btn btn-sm btn-info">التعليقات</a></div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="" class="btn btn-sm btn-info">رسائل الجوال</a></div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="" class="btn btn-sm btn-info">الرسائل الخاصة</a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-warning">
                                                    {{ e($Ad->details) }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#User{{ e($Ad->id) }}" role="button" aria-expanded="false" aria-controls="User{{ e($Ad->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد إعلانات</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
