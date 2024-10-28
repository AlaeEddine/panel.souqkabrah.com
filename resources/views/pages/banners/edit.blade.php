@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($Banner->title) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($Banner->title)}}</h6>
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
                        @can('update-banners')
                        <form action="{{ route('banners.edit.submit', e($Banner->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان البنر')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان البنر')}}" value="{{ e($Banner->title) }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="position" class="text-info">{{__('مكان البنر')}}</label>
                                    <select name="position" id="position" class="custom-select">
                                        <option value="0" @if($Banner->position == 0) selected @endif>{{ __('أسفل الموقع') }}</option>
                                        <option value="1" @if($Banner->position == 1) selected @endif>{{ __('أعلى الموقع') }}</option>
                                        <option value="2" @if($Banner->position == 2) selected @endif>{{ __('شمال الموقع') }}</option>
                                        <option value="3" @if($Banner->position == 3) selected @endif>{{ __('جنوب الموقع') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="date_start" class="text-info">{{ __('تاريخ البداية') }}</label>
                                    <div class="input-group date ltr" id="date_start">
                                        <input type="text" value="@if($Banner->date_start !=null && $Banner->date_start != date('d/m/Y H:i:s', strtotime('01/01/1970 00:00:00'))){{ date('d/m/Y H:i:s',strtotime(e($Banner->date_start))) }}@endif" name="date_start" class="form-control" required/>
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
                                        <input type="text" value="@if($Banner->date_end !=null && $Banner->date_start != date('d/m/Y H:i:s', strtotime('01/01/1970 00:00:00'))){{ date('d/m/Y H:i:s',strtotime(e($Banner->date_end))) }}@endif" name="date_end" class="form-control" required/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description" class="text-info">{{ __('تفاصيل البنر') }}</label>
                                    <textarea class="form-control" id="description" placeholder="{{ __('تفاصيل البنر') }}" name="description" rows="3">{{ e($Banner->description) }}</textarea>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <?php $NBRMAX = 0; ?>
                                        @if($Banner->picture1 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture1" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture1) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture1')" class="text-danger picture1"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture1" value="{{ e($Banner->picture1) }}">@endif
                                        @if($Banner->picture2 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture2" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture2) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture2')" class="text-danger picture2"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture2" value="{{ e($Banner->picture2) }}">@endif
                                        @if($Banner->picture3 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture3" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture3) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture3')" class="text-danger picture3"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture3" value="{{ e($Banner->picture3) }}">@endif
                                        @if($Banner->picture4 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture4" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture4) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture4')" class="text-danger picture4"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture4" value="{{ e($Banner->picture4) }}">@endif
                                        @if($Banner->picture5 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture5" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture5) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture5')" class="text-danger picture5"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture5" value="{{ e($Banner->picture5) }}">@endif
                                        @if($Banner->picture6 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture6" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture6) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture6')" class="text-danger picture6"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture6" value="{{ e($Banner->picture6) }}">@endif
                                        @if($Banner->picture7 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture7" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture7) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture7')" class="text-danger picture7"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture7" value="{{ e($Banner->picture7) }}">@endif
                                        @if($Banner->picture8 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture8" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture8) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture8')" class="text-danger picture8"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture8" value="{{ e($Banner->picture8) }}">@endif
                                        @if($Banner->picture9 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture9" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture9) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture9')" class="text-danger picture9"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture9" value="{{ e($Banner->picture9) }}">@endif
                                        @if($Banner->picture10 != null)<?php $NBRMAX +=1; ?><img class="col-12 rounded picture10" src="{{ e(App\Models\Setting::where('id',1)->first()->url.$Banner->picture10) }}" alt="{{ $Banner->id }}"><br><a onclick="removepic('picture10')" class="text-danger picture10"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture10" value="{{ e($Ad->picture10) }}">@endif
                                        <script>
                                            function removepic(idfield){
                                                $('#'+idfield).remove();
                                                $('.'+idfield).remove();
                                                $(this).hide();
                                            }
                                        </script>

                                        <p><br></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <x-upload :maxfiles=(10-$NBRMAX)  />
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="valide" class="text-info">{{__('بنر مفعل')}}</label>
                                <select name="valide" id="valide" class="custom-select">
                                    <option value="0" @if($Banner->valide ==0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($Banner->valide ==1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('banners.edit.submit', e($Banner->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
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

