@canany(['view-settings','update-settings'], $Setting)
@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 rtl">
    <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cogs"></i> {{__('إعدادات الموقع')}}</h1>
</div>
<form action="{{route('settings.submit')}}" method="POST">
    @csrf
    @if(session('success'))
        <div class="rtl alert alert-success">{{e(session('success'))}}</div>
    @endif
    @if(session('error'))
        <div class="rtl alert alert-danger">{{e(session('error'))}}</div>
    @endif
<div class="row rtl">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('الإعدادات الرئيسية للموقع')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                       <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="url" class="text-primary">{{__('رابط الموقع الرئيسي')}}</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="{{__('رابط الموقع الرئيسي')}}" value="{{e($Setting->url)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="title" class="text-primary">{{__('إسم الموقع الرئيسي')}}</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="{{__('إسم الموقع الرئيسي')}}" value="{{e($Setting->title)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="meta" class="text-primary">{{__('وصف الموقع الرئيسي (meta)')}}</label>
                                <textarea class="form-control" name="meta" id="meta" rows="3" placeholder="{{__('وصف الموقع الرئيسي (meta)')}}">{{e($Setting->meta)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="tags" class="text-primary">{{__('كلمات البحث (الموقع الرئيسي)')}}</label>
                                <textarea class="form-control" name="tags" id="tags" rows="3" placeholder="{{__('كلمات البحث (الموقع الرئيسي)')}}">{{e($Setting->tags)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="intro" class="text-primary">{{__('مقدمة الموقع الرئيسي')}}</label>
                                <textarea class="form-control" name="intro" id="intro" rows="3" placeholder="{{__('مقدمة الموقع الرئيسي')}}">{{e($Setting->intro)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="title2" class="text-primary">{{__('إسم الموقع الفرعي')}}</label>
                                <input type="text" class="form-control" name="title2" id="title2" placeholder="{{__('إسم الموقع الفرعي')}}" value="{{e($Setting->title2)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="emailadmin" class="text-primary">{{__('البريد الإلكتروني لمدير الموقع')}}</label>
                                <input type="text" class="form-control" name="emailadmin" id="emailadmin" placeholder="{{__('البريد الإلكتروني لمدير الموقع')}}" value="{{e($Setting->emailadmin)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="mobileadmin" class="text-primary">{{__('رقم جوال مدير الموقع')}}</label>
                                <input type="text" class="form-control" name="mobileadmin" id="mobileadmin" placeholder="{{__('رقم جوال مدير الموقع')}}"  value="{{e($Setting->mobileadmin)}}">
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            @can('update-settings', $Setting)
            <div class="card-footer">
                <div class="text-center form-group col-md-12 col-12">
                    <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('إعدادات SMTP')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="smtp" class="text-primary">{{__('SMTP')}}</label>
                                <input type="text" class="form-control" name="smtp" id="smtp" placeholder="{{__('SMTP')}}"  value="{{e($Setting->smtp)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="smtpport" class="text-primary">{{__('SMTP Port')}}</label>
                                <input type="text" class="form-control" name="smtpport" id="smtpport" placeholder="{{__('SMTP Port')}}"  value="{{e($Setting->smtpport)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="ssltls" class="text-primary">{{__('SSL/TLS')}}</label>
                                <select name="ssltls" class="form-control" id="ssltls">
                                    <option @if($Setting->ssltls == '1') selected @endif value='1'>SSL</option>
                                    <option @if($Setting->ssltls == '2') selected @endif value='2'>TLS</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="emailresponse" class="text-primary">{{__('بريد الإرسال')}}</label>
                                <input type="text" class="form-control" name="emailresponse" id="emailresponse" placeholder="{{__('بريد الإرسال')}}"  value="{{e($Setting->emailresponse)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="passwordemailresponse" class="text-primary">{{__('كلمة مرور بريد الإرسال')}}</label>
                                <input type="password" class="form-control" name="passwordemailresponse" id="passwordemailresponse" placeholder="{{__('كلمة مرور بريد الإرسال')}}"  value="{{e($Setting->passwordemailresponse)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('update-settings', $Setting)
            <div class="card-footer">
                <div class="text-center form-group col-md-12 col-12">
                    <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('إعدادات إضافية')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="copyright" class="text-primary">{{__('علامة الحقول')}}</label>
                                <input type="text" class="form-control" name="copyright" id="copyright" placeholder="{{__('علامة الحقول')}}"  value="{{e($Setting->copyright)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="description" class="text-primary">{{__('وصف الموقع (meta)')}}</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="{{__('وصف الموقع (meta)')}}">{{e($Setting->description)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="msgclose" class="text-primary">{{__('رسالة غلق الموقع')}}</label>
                                <textarea class="form-control" name="msgclose" id="msgclose" rows="3" placeholder="{{__('رسالة غلق الموقع')}}">{{e($Setting->msgclose)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="header" class="text-primary">{{__('كود الهيدر')}}</label>
                                <textarea class="form-control" name="header" id="header" rows="3" placeholder="{{__('كود الهيدر')}}">{!! $Setting->header !!}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="footer" class="text-primary">{{__('كود الفوتر')}}</label>
                                <textarea class="form-control" name="footer" id="footer" rows="3" placeholder="{{__('كود الفوتر')}}">{!! $Setting->footer !!}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="msgaddproductstatus" class="text-primary">{{__('رسالة للزائر عند إضافة إعلان')}}</label>
                                <select name="msgaddproductstatus" class="form-control" id="msgaddproductstatus">
                                    <option @if($Setting->msgaddproductstatus == '0') selected @endif value='0'>{{__('لا')}}</option>
                                    <option @if($Setting->msgaddproductstatus == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="enableotp" class="text-primary">{{__('تفعيل OTP')}}</label>
                                <select name="enableotp" class="form-control" id="enableotp">
                                    <option @if($Setting->enableotp == '0') selected @endif value='0'>{{__('لا')}}</option>
                                    <option @if($Setting->enableotp == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="msgaddproduct" class="text-primary">{{__('قالب الرسالة للزائر عند إضافة إعلان')}}</label>
                                <textarea class="form-control" name="msgaddproduct" id="msgaddproduct" rows="3" placeholder="{{__('قالب الرسالة للزائر عند إضافة إعلان')}}">{{e($Setting->msgaddproduct)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="msgactivationmobile" class="text-primary">{{__('قالب كود تفعيل الجوال')}}</label>
                                <textarea class="form-control" name="msgactivationmobile" id="msgactivationmobile" rows="3" placeholder="{{__('قالب كود تفعيل الجوال')}}">{{e($Setting->msgactivationmobile)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="advice" class="text-primary">{{__('نصائح عامة')}}</label>
                                <textarea class="form-control" name="advice" id="advice" rows="3" placeholder="{{__('نصائح عامة')}}">{{e($Setting->advice)}}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="ipapi" class="text-primary">{{__('IP API')}}</label>
                                <select name="ipapi" class="form-control" id="ipapi">
                                    <option @if($Setting->ipapi == '0') selected @endif value='0'>{{__('Random')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="timeadnoregister" class="text-primary">{{__('مدة الإعلان الغير مشترك بالموقع')}}</label>
                                <select name="timeadnoregister" class="form-control" id="timeadnoregister">
                                    <option @if($Setting->timeadnoregister == '1') selected @endif value='1'>{{__('سنة')}}</option>
                                    <option @if($Setting->timeadnoregister == '2') selected @endif value='2'>{{__('سنتين')}}</option>
                                    <option @if($Setting->timeadnoregister == '3') selected @endif value='3'>{{__('ثلاث سنوات')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="timeadregister" class="text-primary">{{__('مدة الإعلان العضو')}}</label>
                                <select name="timeadregister" class="form-control" id="timeadregister">
                                    <option @if($Setting->timeadregister == '1') selected @endif value='1'>{{__('سنة')}}</option>
                                    <option @if($Setting->timeadregister == '2') selected @endif value='2'>{{__('سنتين')}}</option>
                                    <option @if($Setting->timeadregister == '3') selected @endif value='3'>{{__('ثلاث سنوات')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="numberadsspecialuser" class="text-primary">{{__('عدد إعلانات العضو المميز باليوم')}}</label>
                                <select name="numberadsspecialuser" class="form-control" id="numberadsspecialuser">
                                    <option @if($Setting->numberadsspecialuser == '0') selected @endif value='0'>{{__('لا نهائي')}}</option>
                                    <option @if($Setting->numberadsspecialuser == '1') selected @endif value='1'>1</option>
                                    <option @if($Setting->numberadsspecialuser == '10') selected @endif value='10'>10</option>
                                    <option @if($Setting->numberadsspecialuser == '15') selected @endif value='15'>15</option>
                                    <option @if($Setting->numberadsspecialuser == '20') selected @endif value='20'>20</option>
                                    <option @if($Setting->numberadsspecialuser == '25') selected @endif value='25'>25</option>
                                    <option @if($Setting->numberadsspecialuser == '30') selected @endif value='30'>30</option>
                                    <option @if($Setting->numberadsspecialuser == '35') selected @endif value='35'>35</option>
                                    <option @if($Setting->numberadsspecialuser == '40') selected @endif value='40'>40</option>
                                    <option @if($Setting->numberadsspecialuser == '45') selected @endif value='45'>45</option>
                                    <option @if($Setting->numberadsspecialuser == '50') selected @endif value='50'>50</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="conditionnumberadsspecialuser" class="text-primary">{{__('شروط إضافة الإعلان')}}</label>
                                <select name="conditionnumberadsspecialuser" class="form-control" id="conditionnumberadsspecialuser">
                                    <option @if($Setting->conditionnumberadsspecialuser == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->conditionnumberadsspecialuser == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="conditionpayedads" class="text-primary">{{__('إعلانات مدفوعة بعد الإعلان 5')}}</label>
                                <select name="conditionpayedads" class="form-control" id="conditionpayedads">
                                    <option @if($Setting->conditionpayedads == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->conditionpayedads == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="conditionpayedadscategories" class="text-primary">{{__('الإعلانات المدفوعة')}}</label>
                                <select name="conditionpayedadscategories[]" multiple class="form-control" id="conditionpayedadscategories">
                                    @foreach(App\Models\Category::where('removed',0)->get() as $Category)
                                        <option @if($Setting->conditionpayedadscategories !=null) @if(in_array($Category->id,str_split($Setting->conditionpayedadscategories))) selected @endif @endif value='{{ $Category->id }}'>{{e($Category->name_1)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="anonymousad" class="text-primary">{{__('السماح لغير المشتركين بنشر الإعلانات')}}</label>
                                <select name="anonymousad" class="form-control" id="anonymousad">
                                    <option @if($Setting->anonymousad == '0') selected @endif value='0'>{{__('لا')}}</option>
                                    <option @if($Setting->anonymousad == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="showadanonymous" class="text-primary">{{__('ظهور الإعلانات لغير المشتركين')}}</label>
                                <select name="showadanonymous" class="form-control" id="showadanonymous">
                                    <option @if($Setting->showadanonymous == '0') selected @endif value='0'>{{__('بموافقة من الإدارة أولا')}}</option>
                                    <option @if($Setting->showadanonymous == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="showadusers" class="text-primary">{{__('ظهور إعلانات الأعضاء')}}</label>
                                <select name="showadusers" class="form-control" id="showadusers">
                                    <option @if($Setting->showadusers == '0') selected @endif value='0'>{{__('بموافقة من الإدارة أولا')}}</option>
                                    <option @if($Setting->showadusers == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="showstoreusers" class="text-primary">{{__('ظهور متاجر الأعضاء')}}</label>
                                <select name="showstoreusers" class="form-control" id="showstoreusers">
                                    <option @if($Setting->showstoreusers == '0') selected @endif value='0'>{{__('بموافقة من الإدارة أولا')}}</option>
                                    <option @if($Setting->showstoreusers == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="showcomments" class="text-primary">{{__('ظهور التعليقات')}}</label>
                                <select name="showcomments" class="form-control" id="showcomments">
                                    <option @if($Setting->showcomments == '0') selected @endif value='0'>{{__('بموافقة من الإدارة أولا')}}</option>
                                    <option @if($Setting->showcomments == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="removecommentonlyspecial" class="text-primary">{{__('السماح للأعضاء المميزين فقط  بإلغاء التعليقات')}}</label>
                                <select name="removecommentonlyspecial" class="form-control" id="removecommentonlyspecial">
                                    <option @if($Setting->removecommentonlyspecial == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->removecommentonlyspecial == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="republishspecialonly" class="text-primary">{{__('إعادة نشر الإعلانات للأعضاء المميزين فقط')}}</label>
                                <select name="republishspecialonly" class="form-control" id="republishspecialonly">
                                    <option @if($Setting->republishspecialonly == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->republishspecialonly == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="allowfilter" class="text-primary">{{__('تفعيل فلترة الإعلانات')}}</label>
                                <select name="allowfilter" class="form-control" id="allowfilter">
                                    <option @if($Setting->allowfilter == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->allowfilter == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="allowslider" class="text-primary">{{__('تفعيل عارض الصور')}}</label>
                                <select name="allowslider" class="form-control" id="allowslider">
                                    <option @if($Setting->allowslider == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->allowslider == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('update-settings', $Setting)
            <div class="card-footer">
                <div class="text-center form-group col-md-12 col-12">
                    <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('إعدادات باقات الجوال')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                        <div class="row">


                            <div class="form-group col-md-6 col-12">
                                <label for="allowmobilepack" class="text-primary">{{__('تفعيل باقات الجوال')}}</label>
                                <select name="allowmobilepack" class="form-control" id="allowmobilepack">
                                    <option @if($Setting->allowmobilepack == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->allowmobilepack == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="allowsms" class="text-primary">{{__('تفعيل رسائل الجوال')}}</label>
                                <select name="allowsms" class="form-control" id="allowsms">
                                    <option @if($Setting->allowsms == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->allowsms == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="apn" class="text-primary">{{__('بوابة رسائل الجوال')}}</label>
                                <input type="text" class="form-control" name="apn" id="apn" placeholder="{{__('بوابة رسائل الجوال')}}" value="{{e($Setting->apn)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="apnuser" class="text-primary">{{__('إسم مستخدم بوابة رسائل الجوال')}}</label>
                                <input type="text" class="form-control" name="apnuser" id="apnuser" placeholder="{{__('إسم مستخدم بوابة رسائل الجوال')}}" value="{{e($Setting->apnuser)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="apnpassword" class="text-primary">{{__('كلمة مرور بوابة رسائل الجوال')}}</label>
                                <input type="password" class="form-control" name="apnpassword" id="apnpassword" placeholder="{{__('كلمة مرور بوابة رسائل الجوال')}}" value="{{e($Setting->apnpassword)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="apnname" class="text-primary">{{__('إسم المرسل لبوابة رسائل الجوال')}}</label>
                                <input type="text" class="form-control" name="apnname" id="apnname" placeholder="{{__('إسم المرسل لبوابة رسائل الجوال')}}" value="{{e($Setting->apnname)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="forceactivatemobile" class="text-primary">{{__('يشترط على العضو تفعيل الجوال')}}</label>
                                <select name="forceactivatemobile" class="form-control" id="forceactivatemobile">
                                    <option @if($Setting->forceactivatemobile == '0') selected @endif value='0'>{{__('لا')}}</option>
                                    <option @if($Setting->forceactivatemobile == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="nbrtentativemobile" class="text-primary">{{__('عدد محاولات تفعيل جوال العضو')}}</label>
                                <input type="text" class="form-control" name="nbrtentativemobile" id="nbrtentativemobile" placeholder="{{__('عدد محاولات تفعيل جوال العضو')}}" value="{{e($Setting->nbrtentativemobile)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="nbrfreesms" class="text-primary">{{__('عدد رسائل الجوال المجانية عند التسجيل')}}</label>
                                <input type="text" class="form-control" name="nbrfreesms" id="nbrfreesms" placeholder="{{__('عدد رسائل الجوال المجانية عند التسجيل')}}" value="{{e($Setting->nbrfreesms)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="nbrcategoriesmobile" class="text-primary">{{__('عدد الأقسام الرئيسية بالجوال')}}</label>
                                <input type="text" class="form-control" name="nbrcategoriesmobile" id="nbrcategoriesmobile" placeholder="{{__('عدد الأقسام الرئيسية بالجوال')}}" value="{{e($Setting->nbrcategoriesmobile)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="forceactivateemail" class="text-primary">{{__('يشترط على العضو تفعيل البريد')}}</label>
                                <select name="forceactivateemail" class="form-control" id="forceactivateemail">
                                    <option @if($Setting->forceactivateemail == '0') selected @endif value='0'>{{__('لا')}}</option>
                                    <option @if($Setting->forceactivateemail == '1') selected @endif value='1'>{{__('نعم')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="allowcash" class="text-primary">{{__('تفعيل رسائل الجوال')}}</label>
                                <select name="allowcash" class="form-control" id="allowcash">
                                    <option @if($Setting->allowcash == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->allowcash == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="commission" class="text-primary">{{__('تفعيل عمولة الموقع')}}</label>
                                <select name="commission" class="form-control" id="commission">
                                    <option @if($Setting->commission == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->commission == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="commissionvalue" class="text-primary">{{__('عمولة الموقع')}}</label>
                                <input type="text" class="form-control" name="commissionvalue" id="commissionvalue" placeholder="{{__('عمولة الموقع')}}" value="{{e($Setting->commissionvalue)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="googlemapskey" class="text-primary">{{__('مفتاح خريطة جوجل')}}</label>
                                <input type="text" class="form-control" name="googlemapskey" id="googlemapskey" placeholder="{{__('مفتاح خريطة جوجل')}}" value="{{e($Setting->googlemapskey)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('update-settings', $Setting)
            <div class="card-footer">
                <div class="text-center form-group col-md-12 col-12">
                    <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('إعدادات مواقع التواصل الإجتماعي')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                        <div class="row">

                            <div class="form-group col-md-6 col-12">
                                <label for="instagram" class="text-primary">{{__('رابط صفحة إنستقرام')}}</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="{{__('رابط صفحة إنستقرام')}}" value="{{e($Setting->instagram)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="facebook" class="text-primary">{{__('رابط صفحة الفيسبوك')}}</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="{{__('رابط صفحة الفيسبوك')}}" value="{{e($Setting->facebook)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="twitter" class="text-primary">{{__('رابط صفحة تويتر')}}</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="{{__('رابط صفحة تويتر')}}" value="{{e($Setting->twitter)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="googleplay" class="text-primary">{{__('رابط تطبيق جوجل بلاي')}}</label>
                                <input type="text" class="form-control" name="googleplay" id="googleplay" placeholder="{{__('رابط تطبيق جوجل بلاي')}}" value="{{e($Setting->googleplay)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="appstore" class="text-primary">{{__('رابط تطبيق آبل ستور')}}</label>
                                <input type="text" class="form-control" name="appstore" id="appstore" placeholder="{{__('رابط تطبيق آبل ستور')}}" value="{{e($Setting->appstore)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="loginsocialmedia" class="text-primary">{{__('تسجيل الدخول بواسطة مواقع التواصل')}}</label>
                                <select name="loginsocialmedia" class="form-control" id="loginsocialmedia">
                                    <option @if($Setting->loginsocialmedia == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->loginsocialmedia == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="paymentgateways" class="text-primary">{{__('تفعيل بوابات الدفع')}}</label>
                                <select name="paymentgateways" class="form-control" id="paymentgateways">
                                    <option @if($Setting->paymentgateways == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->paymentgateways == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="enabletags" class="text-primary">{{__('تفعيل التاج')}}</label>
                                <select name="enabletags" class="form-control" id="enabletags">
                                    <option @if($Setting->enabletags == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->enabletags == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @can('update-settings', $Setting)
            <div class="card-footer">
                <div class="text-center form-group col-md-12 col-12">
                    <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-secondary"><i class="fa fa-cogs"></i> {{__('إعدادات reCAPTCHA2')}}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="pt-0">
                        <div class="row">

                            <div class="form-group col-md-6 col-12">
                                <label for="recaptcha" class="text-primary">{{__('reCAPTCHA2')}}</label>
                                <select name="recaptcha" class="form-control" id="recaptcha">
                                    <option @if($Setting->recaptcha == '0') selected @endif value='0'>{{__('غير مفعل')}}</option>
                                    <option @if($Setting->recaptcha == '1') selected @endif value='1'>{{__('مفعل')}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="recaptchasitekey" class="text-primary">{{__('reCAPTCHA2 SiteKey')}}</label>
                                <input type="text" class="form-control" name="recaptchasitekey" id="recaptchasitekey" placeholder="{{__('reCAPTCHA2 SiteKey')}}" value="{{e($Setting->recaptchasitekey)}}">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="recaptchasecretkey" class="text-primary">{{__('reCAPTCHA2 SecretKey')}}</label>
                                <input type="text" class="form-control" name="recaptchasecretkey" id="recaptchasecretkey" placeholder="{{__('reCAPTCHA2 SecretKey')}}" value="{{e($Setting->recaptchasecretkey)}}">
                            </div>
                       </div>
                </div>
            </div>
        </div>
        @can('update-settings', $Setting)
        <div class="card-footer">
            <div class="text-center form-group col-md-12 col-12">
                <button type="submit"  action="{{route('settings.submit')}}" class="btn btn-primary mt-2"><i class="fa fa-hard-drive"></i> {{__('حفظ البيانات')}}</button>
            </div>
        </div>
        @endcan

    </div>
</div>
</form>

@endsection
@endcanany
