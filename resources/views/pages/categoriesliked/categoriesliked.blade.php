@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('الأقسام المتابعة')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('الأقسام المتابعة')}}</h6>
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
                        @can('view-categories-liked')
                        @if($TotalLikeCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Categories as $Category)
                            @foreach ($LikeCount as $k=>$v)
                                @if($k == $Category->id && $v >0)
                                        <tr>
                                            <td><a href="{{ route('categories.edit',e($Category->id)) }}">{{ e($Category->name_1) }}</a></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#Category{{ e($Category->id) }}" role="button" aria-expanded="false" aria-controls="Category{{ e($Category->id) }}">
                                                <i class="fa fa-square-caret-down"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="collapse" id="Category{{ e($Category->id) }}">
                                                <div class="card card-body">
                                                    <div class="row">
                                                        @foreach ($Likes as $Like)
                                                        @if($Category->id == $Like->id_from)
                                                        <table class="table">
                                                            <tr>
                                                                <td>العضو</td>
                                                                <td><a href="{{ route('users.edit',e($Like->id_from)) }}">{{ e($Like->name_from) }}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>صاحب الإعلان</td>
                                                                <td><a href="{{ route('users.edit',e($Like->id_to)) }}">{{ e($Like->name_to) }}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تاريخ الإضافة إلى المفضلة</td>
                                                                <td>{{ e($Like->created_at) }}</td>
                                                            </tr>
                                                        </table>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach


                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-primary">{{ __('القائمة فارغة') }}</div>
                        @endif
                        @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
