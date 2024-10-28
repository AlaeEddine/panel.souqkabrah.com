@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('التعليقات المخالفة')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('التعليقات المخالفة')}}</h6>
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
                        @can('view-banned-comments')
                        @if($BannedCommentCount>0)
                        <table class="table table-bordered table-hover table-stripped">
                            @foreach ($BannedComments as $Comment)
                            <tr>
                                <td>{{ e($Comment->comment) }}</td>
                                @can('delete-banned-comments')<td class="text-center"><a href="{{route('comments.delete', e($Comment->id))}}" class="btn btn-sm btn-info">حذف</a></td>@endcan
                                @can('update-banned-comments')<td class="text-center"><a href="{{route('comments.edit', e($Comment->id))}}" class="btn btn-sm btn-info">تعديل</a></td>@endcan
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="alert alert-info">لا توجد تعليقات مخالفة</div>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
