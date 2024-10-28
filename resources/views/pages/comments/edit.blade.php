@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('التعليق رقم') }} {{  e($Comment->id) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('التعليق رقم') }} {{  e($Comment->id) }}</h6>
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
                        @can('update-comments')
                        <form action="{{ route('comments.edit.submit', e($Comment->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                            <div class="form-group col-12">
                                <label for="comment" class="text-info">{{ __('التعليق') }}</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3">{{ e($Comment->comment) }}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="banned" class="text-info">{{__('تعليق مخالف')}}</label>
                                <select name="banned" id="banned" class="custom-select">
                                    <option value="0" @if($Comment->banned == 0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($Comment->banned == 1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="valide" class="text-info">{{__('الموافقة التعليق')}}</label>
                                <select name="valide" id="valide" class="custom-select">
                                    <option value="0" @if($Comment->valide == 0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($Comment->valide == 1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                        </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('comments') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
