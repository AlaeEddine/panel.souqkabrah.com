@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($Ad->title) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($Ad->title)}}</h6>
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
                        @can('update-ads')
                        <form action="{{ route('ads.edit.submit', e($Ad->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="title" class="text-info">{{__('عنوان الإعلان')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان الإعلان')}}" value="{{e($Ad->title)}}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_country" class="text-info">{{__('الدولة')}}</label>
                                    <select name="id_country" id="id_country" class="custom-select">
                                        @foreach ($Countries as $Country)
                                        <option value="{{ e($Country->id) }}" @if($Ad->id_country == $Country->id) selected @endif>{{ e($Country->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_city" class="text-info">{{__('اختر المدينة')}}</label>
                                    <select name="id_city" id="id_city" class="custom-select">
                                        @foreach ($Cities as $City)
                                        <option value="{{ e($City->id) }}" @if($Ad->id_city == $City->id) selected @endif>{{ e($City->name_ar) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_category" class="text-info">{{__('اختر السوق')}}</label>
                                    <select name="id_category" id="id_category" class="custom-select">
                                        @foreach ($Categories as $Category)
                                        <option value="{{ e($Category->id) }}" @if($Ad->id_category == $Category->id) selected @endif><i class="{{ $Category->icon }}"></i>{{ e($Category->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subcategory" class="text-info">{{__('اختر الفرع')}}</label>
                                    <select name="id_subcategory" id="id_subcategory" class="custom-select">
                                        @foreach ($SubCategories as $SubCategory)
                                        <option value="{{ e($SubCategory->id) }}" @if($Ad->id_subcategory == $SubCategory->id) selected @endif>{{ e($SubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_subsubcategory" class="text-info">{{__('نوع الإعلان')}}</label>
                                    <select name="id_subsubcategory" id="id_subsubcategory" class="custom-select">
                                        @foreach ($SubSubCategories as $SubSubCategory)
                                        <option value="{{ e($SubSubCategory->id) }}" @if($Ad->id_subsubcategory == $SubSubCategory->id) selected @endif>{{ e($SubSubCategory->name_1) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="fixed" class="text-info">{{__('إعلان مثبث')}}</label>
                                    <select name="fixed" id="fixed" class="custom-select">
                                        <option value="0" @if($Ad->fixed == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Ad->fixed == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="id_contact" class="text-info">{{__('وسيلة التواصل')}}</label>
                                    <select name="id_contact" id="id_contact" class="custom-select">
                                        <option value="0" @if($Ad->id_contact == 0) selected @endif>{{ __('رقم الجوال') }}</option>
                                        <option value="1" @if($Ad->id_contact == 1) selected @endif>{{ __('البريد الإلكتروني') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="mazad" class="text-info">{{__('مزاد')}}</label>
                                    <select name="mazad" id="mazad" class="custom-select">
                                        <option value="0" @if($Ad->mazad == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Ad->mazad == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="valide" class="text-info">{{__('الموافقة على الإعلان')}}</label>
                                    <select name="valide" id="valide" class="custom-select">
                                        <option value="0" @if($Ad->valide == 0) selected @endif>{{ __('لا') }}</option>
                                        <option value="1" @if($Ad->valide == 1) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="allow_comments" class="text-info">{{__('إلغاء التعليقات على الإعلان')}}</label>
                                    <select name="allow_comments" id="allow_comments" class="custom-select">
                                        <option value="1" @if($Ad->allow_comments == 1) selected @endif>{{ __('لا') }}</option>
                                        <option value="0" @if($Ad->allow_comments == 0) selected @endif>{{ __('نعم') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="tags" class="text-info">{{__('الوسوم')}}</label>
                                    <input type="text" class="form-control" name="tags" id="tags" placeholder="{{__('الوسوم')}}" value="{{e($Ad->tags)}}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="details" class="text-info">{{ __('تفاصيل الإعلان') }}</label>
                                    <textarea class="form-control" id="details" name="details" rows="3">{{ e($Ad->details) }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <?php $NBRMAX = 0; ?>
                                        @if($Ad->picture1 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture1" src="{{ e($Ad->picture1) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture1')" class="text-danger picture1"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture1" value="{{ e($Ad->picture1) }}">@endif
                                        @if($Ad->picture2 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture2" src="{{ e($Ad->picture2) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture2')" class="text-danger picture2"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture2" value="{{ e($Ad->picture2) }}">@endif
                                        @if($Ad->picture3 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture3" src="{{ e($Ad->picture3) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture3')" class="text-danger picture3"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture3" value="{{ e($Ad->picture3) }}">@endif
                                        @if($Ad->picture4 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture4" src="{{ e($Ad->picture4) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture4')" class="text-danger picture4"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture4" value="{{ e($Ad->picture4) }}">@endif
                                        @if($Ad->picture5 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture5" src="{{ e($Ad->picture5) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture5')" class="text-danger picture5"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture5" value="{{ e($Ad->picture5) }}">@endif
                                        @if($Ad->picture6 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture6" src="{{ e($Ad->picture6) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture6')" class="text-danger picture6"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture6" value="{{ e($Ad->picture6) }}">@endif
                                        @if($Ad->picture7 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture7" src="{{ e($Ad->picture7) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture7')" class="text-danger picture7"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture7" value="{{ e($Ad->picture7) }}">@endif
                                        @if($Ad->picture8 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture8" src="{{ e($Ad->picture8) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture8')" class="text-danger picture8"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture8" value="{{ e($Ad->picture8) }}">@endif
                                        @if($Ad->picture9 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture9" src="{{ e($Ad->picture9) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture9')" class="text-danger picture9"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture9" value="{{ e($Ad->picture9) }}">@endif
                                        @if($Ad->picture10 != null)<?php $NBRMAX +=1; ?><img class="col-2 rounded picture10" src="{{ e($Ad->picture10) }}" alt="{{ $Ad->id }}"><br><a onclick="removepic('picture10')" class="text-danger picture10"><i class="fa fa-trash"></i></a><input type="hidden" name="pictures[]" id="picture10" value="{{ e($Ad->picture10) }}">@endif
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
                                <label for="banned" class="text-info">{{__('إعلان مخالف')}}</label>
                                <select name="banned" id="banned" class="custom-select">
                                    <option value="0" @if($Ad->banned == 0) selected @endif>{{ __('لا') }}</option>
                                    <option value="1" @if($Ad->banned == 1) selected @endif>{{ __('نعم') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" formaction="{{ route('ads.edit.submit', e($Ad->id)) }}" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('ads') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
