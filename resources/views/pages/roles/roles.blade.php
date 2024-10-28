@extends('layouts.app')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-tie"></i> {{__('صلاحيات المدير')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-fw fa-user-tie"></i>  {{__('صلاحيات المدير')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">{{e(session('success'))}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{e(session('error'))}}</div>
                        @endif
                        @can('view-roles')
                        <table class="table table-bordered table-hover table-stripped">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary"><i class="fa fa-user-tie"></i> {{ __('أنواع المدراء') }}</th>
                                    @can('update-roles')<th class="text-center text-secondary"><i class="fa fa-pencil"></i> {{ __('تعديل') }}</th>@endcan
                                    @can('delete-roles')<th class="text-center text-secondary"><i class="fa fa-trash"></i> {{ __('حذف') }}</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Roles as $Role)
                                    @if($Role->name == 'Admin' || $Role->name == 'SuperAdmin')
                                    <tr>
                                        <td>
                                            @if($Role->name == 'SuperAdmin')<span class="badge bg-dark text-white">{{ e($SuperAdminsCount) }}</span> @endif
                                            @if($Role->name == 'Admin')<span class="badge bg-dark text-white">{{ e($AdminsCount) }}</span> @endif
                                            {{ e($Role->name) }}
                                        </td>
                                        @can('update-roles')<td class="text-center"><a href="{{route('roles.edit', e($Role->id))}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> {{ __('تعديل') }}</a></td>@endcan
                                        @can('delete-roles')<td class="text-center"><a href="{{route('roles.delete', e($Role->id))}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> {{ __('حذف') }}</a></td>@endcan
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <?php



                        ?>
                        @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
