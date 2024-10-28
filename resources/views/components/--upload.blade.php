@props(['name'])
<div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text text-info">{{ __("الصورة $name ") }} </span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="picture{{ $name }}" name="picture[]" />
      <label class="custom-file-label" for="picture{{ $name }}" name="picture{{ $name }}">{{ __("اختر الصورة  $name") }}</label>
    </div>
  </div>
