@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ e($Rating->rating_name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{e($Rating->rating_name)}}</h6>
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
                        @can('update-ratings')
                        <form action="{{ route('ratings.edit.submit',e(request('id'))) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="rating_name" class="text-info">{{__('التقييم')}}</label>
                                    <input type="text" class="form-control" name="rating_name" id="rating_name" placeholder="{{__('التقييم')}}" value="{{e($Rating->rating_name)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone" class="text-info">{{__('عدد النجوم')}}</label>
                                    <select class="custom-select" name="rating_value">
                                        <option @if($Rating->rating_value == 1) selected @endif value="1">1</option>
                                        <option @if($Rating->rating_value == 2) selected @endif value="2">2</option>
                                        <option @if($Rating->rating_value == 3) selected @endif value="3">3</option>
                                        <option @if($Rating->rating_value == 4) selected @endif value="4">4</option>
                                        <option @if($Rating->rating_value == 5) selected @endif value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <button type="submit" class="btn btn-primary mb-2">{{__('حفظ البيانات')}}</button>
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('ratings') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
