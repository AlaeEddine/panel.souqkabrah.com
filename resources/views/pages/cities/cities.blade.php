@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('لائحة المدن')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('لائحة المدن')}}</h6>
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
                        @can('view-cities')
                        <table class="table table-bordered table-hover table-stripped" id="myTable">
                            <thead>
                                <tr>
                                    <th>المدينة</th>
                                    <th><i class="fa fa-pencil"></i></th>
                                    <th><i class="fa fa-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Cities as $City)
                                <tr>
                                    <td>{{ e($City->name_ar) }}</td>
                                    <td class="text-center">@can('update-cities')<a href="{{route('cities.edit', e($City->id))}}"><i class="fa fa-pencil text-success"></i></a>@endcan</td>
                                    <td class="text-center">@can('delete-cities')<a href="{{route('cities.delete', e($City->id))}}"><i class="fa fa-trash text-danger"></i></a>@endcan</td>
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
