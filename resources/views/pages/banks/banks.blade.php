@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('الحسابات البنكية')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('الحسابات البنكية')}}</h6>
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
                        @can('view-banks')
                        @can('create-banks')<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-1"><a href="{{route('banks.create')}}" class="btn btn-sm btn-info">حساب بنكي جديد</a></div>@endcan
                        @if($BanksCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Banks as $Bank)
                            <tr>
                                <td>{{ e($Bank->name_1) }}</td>
                                @can('update-banks')<td class="text-center"><a href="{{route('banks.edit', e($Bank->id))}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a></td>@endcan
                                @can('delete-banks')<td class="text-center"><a href="{{route('banks.delete', e($Bank->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>@endcan
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد حسابات بنكية</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
