@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{ e($SubSubCategory->name_1) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@if($SubSubCategory->icon != null) <img src="{{e(App\Models\Setting::where('id',1)->first()->url.$SubSubCategory->icon)}}" alt="{{e($SubSubCategory->name_1)}}" class="os-icon" style="width: 50px !important;height:50px !important;" /> @endif {{e($SubSubCategory->name_1)}}</h6>
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
                        @can('update-subcategories')
                        <form action="{{ route('subsubcategories.edit.submit',e(request('id'))) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12" dir="ltr">
                                    <label for="icon" class="text-info">{{__('Icon')}}</label>
                                    <x-uploadads filetype="images" maxfiles="1" filename="icon" :url="route('categories.icons.upload.submit')" />
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_1" class="text-info">{{__('إسم الفرع (عربي)')}}</label>
                                    <input type="text" class="form-control" name="name_1" id="name_1" placeholder="{{__('إسم الفرع (عربي)')}}" value="{{e($SubSubCategory->name_1)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_2" class="text-info">{{__('إسم الفرع (إنجليزي)')}}</label>
                                    <input type="text" class="form-control" name="name_2" id="name_2" placeholder="{{__('إسم الفرع (إنجليزي)')}}" value="{{e($SubSubCategory->name_2)}}">
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <button type="submit" class="btn btn-primary mb-2">{{__('حفظ البيانات')}}</button>
                            </div>
                        </form>
                        <p><br></p>
                        <center><a href="{{ route('subcategories.edit',e($SubSubCategory->subcategory)) }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
