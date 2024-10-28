@props(['selected'=>null,'name'=>'country','class'=>'col-12','required'=>0])<?php use App\Models\Country; $Countries = Country::get(); ?>
<div class="form-group {{ $class }}">
<label for="{{ $name }}" class="text-info">{{__('الدولة')}}</label>
<select name="{{ $name }}" id="{{ $name }}" class="custom-select" @if($required == 1) required @endif>
    @foreach ($Countries as $Country)
    <option value="{{ e($Country->id) }}" @if($selected == $Country->id) selected @endif>{{ e($Country->name_ar) }}</option>
    @endforeach
</select>
</div>
