@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('القائمة السوداء')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('القائمة السوداء')}}</h6>
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
                        @can('view-blacklist')
                        @if($BlaklistCount >0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Blacklists as $User)
                            <tr>
                                <td>{{ e($User->name) }}</td>
                                @can('update-users') <td class="text-center"><a href="{{route('users.edit', e($User->id))}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a></td>@endcan
                            </tr>
                            @endforeach
                        </table>
                        @else
                            <div class="alert alert-primary">لا يوجد أعضاء في اللائحة السوداء</div>
                        @endif
                        @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
