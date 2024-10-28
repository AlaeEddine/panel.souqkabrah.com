@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($GoogleAd->title) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($GoogleAd->title)}}</h6>
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
                        @can('update-google-ads')
                        <form action="{{ route('googleads.edit.submit', e($GoogleAd->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان الإعلان')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان الإعلان')}}" value="{{ e($GoogleAd->title) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="position" class="text-info">{{__('مكان الإعلان')}}</label>
                                    <select name="position" id="position" class="custom-select">
                                        <option value="0" @if($GoogleAd->position == 0) selected @endif>{{ __('أسفل الموقع') }}</option>
                                        <option value="1" @if($GoogleAd->position == 1) selected @endif>{{ __('أعلى الموقع') }}</option>
                                        <option value="2" @if($GoogleAd->position == 2) selected @endif>{{ __('شمال الموقع') }}</option>
                                        <option value="3" @if($GoogleAd->position == 3) selected @endif>{{ __('جنوب الموقع') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="date_start" class="text-info">{{ __('تاريخ البداية') }}</label>
                                    <div class="input-group date ltr" id="date_start">
                                        <input type="text" value="@if($GoogleAd->date_start !=null && $GoogleAd->date_start != date('d/m/Y H:i:s', strtotime('01/01/1970 00:00:00'))){{ date('d/m/Y H:i:s',strtotime(e($GoogleAd->date_start))) }}@endif" name="date_start" class="form-control" required/>
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
                                        <input type="text" value="@if($GoogleAd->date_end !=null && $GoogleAd->date_start != date('d/m/Y H:i:s', strtotime('01/01/1970 00:00:00'))){{ date('d/m/Y H:i:s',strtotime(e($GoogleAd->date_end))) }}@endif" name="date_end" class="form-control" required/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description" class="text-info">{{ __('تفاصيل الإعلان') }}</label>
                                    <textarea class="form-control" id="description" placeholder="{{ __('تفاصيل الإعلان') }}" name="description" rows="3">{{ e($GoogleAd->description) }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="js" class="text-info">{{ __('كود Javascript') }}</label>
                                    <textarea class="form-control" id="js" placeholder="{{ __('كود Javascript') }}" name="js" rows="3">{{ e($GoogleAd->js) }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="css" class="text-info">{{ __('كود CSS') }}</label>
                                    <textarea class="form-control" id="css" placeholder="{{ __('كود CSS') }}" name="css" rows="3">{{ e($GoogleAd->css) }}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="html" class="text-info">{{ __('كود HTML') }}</label>
                                    <textarea class="form-control" id="html" placeholder="{{ __('كود HTML') }}" name="html" rows="3">{{ e($GoogleAd->html) }}</textarea>
                                </div>

                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="valide" class="text-info">{{__('بنر مفعل')}}</label>
                                <select name="valide" id="valide" class="custom-select">
                                    <option value="0" @if($GoogleAd->valide ==0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($GoogleAd->valide ==1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('googleads.edit.submit', e($GoogleAd->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('googleads') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

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

