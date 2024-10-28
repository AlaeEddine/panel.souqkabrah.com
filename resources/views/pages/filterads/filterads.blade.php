@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('فلترة الإعلانات')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('فلترة الإعلانات')}}</h6>
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
                        @can('view-filter-ads')
                        @can('create-filter-ads')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('filterads.create')}}" class="btn btn-sm btn-info">فلترة جديدة</a></div>@endcan
                        @if($CountFilter>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Filters as $Filter)
                            <tr>
                                <td>{{ e($Filter->keywordAd) }}</td>
                                @can('delete-filter-ads')<td class="text-center"><a href="{{route('filterads.delete', e($Filter->id))}}" class="btn btn-sm btn-info">حذف</a></td>@endcan
                                @can('update-filter-ads')<td class="text-center"><a href="{{route('filterads.edit', e($Filter->id))}}" class="btn btn-sm btn-info">تعديل</a></td>@endcan

                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد فلترة</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
