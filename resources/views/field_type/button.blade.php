<?php
$uniqueIdConfig = md5($field['path']);
$cssClass = '';
if (array_key_exists('class', $field)) {
    $cssClass = $field['class'];
}
?>
<div class="field-label">
    <label for="">{{$field['label']}}</label>
</div>
<div>
    <button class="btn btn-configuration {{$cssClass}}" id="{{$uniqueIdConfig}}">{{$field['button_label']}}</button>
</div>