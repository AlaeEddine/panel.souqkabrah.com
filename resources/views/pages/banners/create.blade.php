@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ __('بنر جديد') }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('بنر جديد')}}</h6>
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
                        @can('create-banners')
                        <form action="{{ route('banners.create.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان البنر')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان البنر')}}" value="{{old('title')}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="position" class="text-info">{{__('مكان البنر')}}</label>
                                    <select name="position" id="position" class="custom-select">
                                        <option value="1" selected>{{ __('أعلى الموقع') }}</option>
                                        <option value="0">{{ __('أسفل الموقع') }}</option>
                                        <option value="2">{{ __('شمال الموقع') }}</option>
                                        <option value="3">{{ __('جنوب الموقع') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="date_start" class="text-info">{{ __('تاريخ البداية') }}</label>
                                    <div class="input-group date ltr" id="date_start">
                                        <input type="text" value="{{ old('date_start',date('d/m/Y H:i:s')) }}" name="date_start" class="form-control" required/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="date_end" class="text-info">{{ __('تاريخ النهاية') }}</label>
                                    <div class="input-group date ltr" id="date_end">
                                        <input type="text" value="{{ old('date_end') }}" name="date_end" class="form-control" required/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description" class="text-info">{{ __('تفاصيل البنر') }}</label>
                                    <textarea class="form-control" id="description" placeholder="{{ __('تفاصيل البنر') }}" name="description" rows="3"></textarea>
                                </div>
                                <x-upload maxfiles="10" url="/banners/upload" />

                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('بنر مفعل')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0">{{ __('لا') }}</option>
                                        <option value="1" selected>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                        </div>

                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('banners.create.submit') }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('banners') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
@parent
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
     $(function(){
        $('#date_start').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "DD/MM/YYYY HH:mm:ss",
        });
        $('#date_end').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "DD/MM/YYYY HH:mm:ss",
        });
     });
</script>
@endsection
