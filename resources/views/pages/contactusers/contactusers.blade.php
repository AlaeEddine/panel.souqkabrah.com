@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{__('مراسلة الأعضاء')}}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{__('مراسلة الأعضاء')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="card-body pt-0">
                        @if(session('success'))
                            <div class="alert alert-success">{{e(session('success'))}}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{e(session('error'))}}</div>
                        @endif
                        @can('view-contact-users')
                        @can('create-contact-users')<form action="{{ route('contactusers.submit') }}" method="POST">@csrf @endcan
                                <div class="row">
                                    <x-country selected="2" required=1 />
                                    <x-users required=1  />
                                    <div class="form-group col-12">
                                        <label for="message" class="text-info">{{ __('الرسالة') }}</label>
                                        <textarea class="form-control" id="message" placeholder="{{ __('الرسالة') }}" name="message" rows="3" required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        @can('create-contact-users')<input type="submit" class="btn btn-primary mb-2" value="{{__('إرسال')}}">@endcan
                                    </div>
                                </div>
                                @can('create-contact-users')</form>@endcan
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
