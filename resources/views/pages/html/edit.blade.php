@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">#{{ e($Html->id) }} {{ __('الهيدر و الفوتر') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">#{{ e($Html->id) }} {{ __('الهيدر و الفوتر') }}</h6>
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
                        @can('update-html')
                        <form action="{{ route('html.edit.submit', e($Html->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <x-country class="col-md-6 col-12" selected="{{ e($Html->id_country) }}" />
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('صفحة مفعلة')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($Html->valide ==0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Html->valide ==1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="header" class="text-info">{{ __('الهيدر') }}</label>
                                    <textarea class="form-control" id="header" placeholder="{{ __('الهيدر') }}" name="header" rows="3">{{ e($Html->header) }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="footer" class="text-info">{{ __('الفوتر') }}</label>
                                    <textarea class="form-control" id="footer" placeholder="{{ __('الفوتر') }}" name="footer" rows="3">{{ e($Html->footer) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('html.edit.submit', e($Html->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('html') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
