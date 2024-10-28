@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800">{{  e($Role->name) }}</h1>
</div>
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ e($Role->name)}}</h6>
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
                        @can('update-roles')
                        <form action="{{ route('roles.edit.submit', e($Role->id)) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name" class="text-info">{{__('إسم المجموعة')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('إسم المجموعة')}}" value="{{e($Role->name)}}" disabled>
                                </div>
                                <div class="form-group col-12">
                                    <table class="table table-bordered table-hover table-stripped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ __('الحقوق') }}</th>
                                                <th class="text-center">{{ __('الولوج') }}</th>
                                                <th class="text-center">{{ __('الإضافة') }}</th>
                                                <th class="text-center">{{ __('التعديل') }}</th>
                                                <th class="text-center">{{ __('الحذف') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PERMISSION as $K=>$PermissionName)
                                            <tr>
                                                <th class="text-center">
                                                    <?php
                                                    if($K == 'settings'){
                                                        echo "<span>إعدادات الموقع</span>";
                                                    }elseif($K == 'contact'){
                                                        echo "<span>رسائل إتصل بنا</span>";
                                                    }elseif($K == 'roles'){
                                                        echo "<span>صلاحيات المدير</span>";
                                                    }elseif($K == 'users'){
                                                        echo "<span>الأعضاء</span>";
                                                    }elseif($K == 'cities'){
                                                        echo "<span>المدن</span>";
                                                    }elseif($K == 'categories'){
                                                        echo "<span>أقسام الإعلانات</span>";
                                                    }elseif($K == 'subcategories'){
                                                        echo "<span>الأقسام الفرعية</span>";
                                                    }elseif($K == 'subsubcategories'){
                                                        echo "<span>أنواع الإعلانات</span>";
                                                    }elseif($K == 'private-messages'){
                                                        echo "<span>الرسائل الخاصة</span>";
                                                    }elseif($K == 'ratings'){
                                                        echo "<span>التقييمات</span>";
                                                    }elseif($K == 'likes'){
                                                        echo "<span>قائمة المفضلة</span>";
                                                    }elseif($K == 'likers'){
                                                        echo "<span>قائمة المتابعين</span>";
                                                    }elseif($K == 'categories-liked'){
                                                        echo "<span>الأقسام المتابعة</span>";
                                                    }elseif($K == 'ads'){
                                                        echo "<span>الإعلانات</span>";
                                                    }elseif($K == 'banned-ads'){
                                                        echo "<span>الإعلانات المخالفة</span>";
                                                    }elseif($K == 'filter-ads'){
                                                        echo "<span>فلترة الإعلانات</span>";
                                                    }elseif($K == 'comments'){
                                                        echo "<span>التعليقات</span>";
                                                    }elseif($K == 'banned-comments'){
                                                        echo "<span>التعليقات المخالفة</span>";
                                                    }elseif($K == 'stores'){
                                                        echo "<span>المتاجر</span>";
                                                    }elseif($K == 'payment-gateways'){
                                                        echo "<span>بوابات الدفع</span>";
                                                    }elseif($K == 'money-transferts'){
                                                        echo "<span>التحويلات المالية</span>";
                                                    }elseif($K == 'banks'){
                                                        echo "<span>الحسابات البنكية</span>";
                                                    }elseif($K == 'bank-transferts'){
                                                        echo "<span>التحويلات البنكية</span>";
                                                    }elseif($K == 'blacklist'){
                                                        echo "<span>القائمة السوداء</span>";
                                                    }elseif($K == 'banners'){
                                                        echo "<span>إعلانات البنارات</span>";
                                                    }elseif($K == 'google-ads'){
                                                        echo "<span>إعلانات جوجل</span>";
                                                    }elseif($K == 'pages'){
                                                        echo "<span>الصفحات</span>";
                                                    }elseif($K == 'mobile-data'){
                                                        echo "<span>باقات رسائل الجوال</span>";
                                                    }elseif($K == 'sms-groups'){
                                                        echo "<span>مجموعات رسائل الجوال</span>";
                                                    }elseif($K == 'sms'){
                                                        echo "<span>رسائل الجوال</span>";
                                                    }elseif($K == 'contact-users'){
                                                        echo "<span>مراسلة الأعضاء</span>";
                                                    }elseif($K == 'plans'){
                                                        echo "<span>باقات العضوية</span>";
                                                    }elseif($K == 'social-media'){
                                                        echo "<span>مواقع التواصل</span>";
                                                    }elseif($K == 'html'){
                                                        echo "<span>كود الهيدر و الفوتر</span>";
                                                    }else{
                                                        echo $K;
                                                    }
                                                    ?>
                                                </th>
                                                <th class="text-center">
                                                    @foreach ($PermissionName as $PN)
                                                        @if($PN == "view-$K")
                                                        <div class="form-check">
                                                            <input class="form-check-input position-static" name="formPermissionsList[]" type="checkbox" id="{{ $PN }}" @if($Role->hasPermissionTo($PN)) checked @endif value="{{ $PN }}" aria-label="{{ $PN }}" @if(request('id') == 3) disabled @endif>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th class="text-center">
                                                    @foreach ($PermissionName as $PN)
                                                        @if($PN == "create-$K")
                                                        <div class="form-check">
                                                            <input class="form-check-input position-static" name="formPermissionsList[]" type="checkbox" id="{{ $PN }}" @if($Role->hasPermissionTo($PN)) checked @endif value="{{ $PN }}" aria-label="{{ $PN }}" @if(request('id') == 3) disabled @endif>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th class="text-center">
                                                    @foreach ($PermissionName as $PN)
                                                        @if($PN == "update-$K")
                                                        <div class="form-check">
                                                            <input class="form-check-input position-static" name="formPermissionsList[]" type="checkbox" id="{{ $PN }}" @if($Role->hasPermissionTo($PN)) checked @endif value="{{ $PN }}" aria-label="{{ $PN }}" @if(request('id') == 3) disabled @endif>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th class="text-center">
                                                    @foreach ($PermissionName as $PN)
                                                        @if($PN == "delete-$K")
                                                        <div class="form-check">
                                                            <input class="form-check-input position-static" name="formPermissionsList[]" type="checkbox" id="{{ $PN }}" @if($Role->hasPermissionTo($PN)) checked @endif value="{{ $PN }}" aria-label="{{ $PN }}" @if(request('id') == 3) disabled @endif>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <input type="submit" class="btn btn-primary mb-2" value="{{__('حفظ البيانات')}}">
                            </div>
                        </form>
                        <p><br></p>
                        @endcan
                        <center><a href="{{ route('roles') }}" class="btn btn-secondary">{{ __('الرجوع') }}</a></center>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
