@props(['selected'=>null,'name'=>'user','class'=>'col-12','required'=>0])<?php use App\Models\User; $Users = User::where('removed','0')->get(); ?>
<div class="form-group {{ $class }}">
<label for="{{ $name }}" class="text-info">{{__('الأعضاء')}}</label>
<select name="{{ $name }}[]" id="{{ $name }}" class="custom-select" multiple  @if($required == 1) required @endif>
    @foreach ($Users as $User)
    <option value="{{ e($User->id) }}" @if($selected == $User->id) selected @endif>{{ e($User->name) }}</option>
    @endforeach
</select>
</div>
