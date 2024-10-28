@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('التعليقات')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('التعليقات')}}</h6>
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
                        @can('view-comments')
                        @if($TotalComment>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($Ads as $Ad)
                            @foreach ($CommentCount as $k=>$v)
                                @if($k == $Ad->id && $v >0)
                                        <tr>
                                            <td><a href="{{ route('ads.edit',e($Ad->id)) }}">{{ e($Ad->title) }}</a></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#Ad{{ e($Ad->id) }}" role="button" aria-expanded="false" aria-controls="Ad{{ e($Ad->id) }}">
                                                <i class="fa fa-square-caret-down"></i>
                                            </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="collapse" id="Ad{{ e($Ad->id) }}">
                                                <div class="card card-body">
                                                    <div class="row">
                                                        @foreach ($Comments as $Comment)
                                                        @if($Ad->id == $Comment->id_ads)
                                                        <table class="table">
                                                            <tr>
                                                                <td>{{ __('التعليق') }}</td>
                                                                <td><a href="{{ route('comments.edit',e($Comment->id)) }}">{{ e($Comment->comment) }}</a> </td>
                                                                @can('delete-comments')<td class="text-center" colspan="2"><a href="{{route('comments.delete', e($Comment->id))}}"><i class="fa fa-trash text-danger"></i></a></td>@endcan
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
                        <div class="alert alert-info">لا توجد تعليقات</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
