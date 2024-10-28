@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('التقييمات')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('التقييمات')}}</h6>
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
                        @can('view-ratings')
                        @if($RatingCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Ratings as $Rating)
                            <tr>
                                <td>{{ e($Rating->rating_name) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#Rating{{ e($Rating->id) }}" role="button" aria-expanded="false" aria-controls="Rating{{ e($Rating->id) }}">
                                    <i class="fa fa-square-caret-down"></i>
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="collapse" id="Rating{{ e($Rating->id) }}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <table class="table">
                                                <tr>
                                                    @can('update-ratings')<td class="text-center"><a href="{{route('ratings.edit', e($Rating->id))}}"><i class="fa fa-pencil text-success"></i></a></td>@endcan
                                                    @can('delete-ratings')<td class="text-center"><a href="{{route('ratings.delete', e($Rating->id))}}"><i class="fa fa-trash text-danger"></i></a></td>@endcan
                                                </tr>
                                                <tr>
                                                    <td>تقييم من</td>
                                                    <td><a href="{{ route('users.edit',e($Rating->id_from)) }}">{{ e($Rating->name_from) }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td>تقييم إلى</td>
                                                    <td><a href="{{ route('users.edit',e($Rating->id_to)) }}">{{ e($Rating->name_to) }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td>تم الشراء</td>
                                                    <td>@if($Rating->buyed == 1){{ __('نعم') }}@else{{ __('لا') }}@endif</td>
                                                </tr>
                                                <tr>
                                                    <td>تاريخ الإضافة</td>
                                                    <td>{{ e($Rating->created_at) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-primary">{{ __('لا توجد تقييمات') }}</div>
                        @endif
                        @endcan

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
