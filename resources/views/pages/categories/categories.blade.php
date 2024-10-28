@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('الأقسام الرئيسية')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('الأقسام الرئيسية')}}</h6>
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
                        <table class="table table-bordered table-hover">
                            <tbody>
                                @foreach($Categories as $Category)
                                <tr>
                                    <td><img src="{{e(App\Models\Setting::where('id',1)->first()->url.$Category->icon)}}" alt="{{e($Category->name_1)}}" class="os-icon" style="width: 50px !important;height:50px !important;" /> {{e($Category->name_1)}}</td>
                                    @can('update-categories')<td class="text-center"><a href="{{route('categories.edit', e($Category->id))}}"><i class="fa fa-pencil text-success"></i></a></td>@endcan
                                    @can('delete-categories')<td class="text-center"><a href="{{route('categories.delete', e($Category->id))}}"><i class="fa fa-trash text-danger"></i></a></td>@endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
