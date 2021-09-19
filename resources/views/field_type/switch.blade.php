<?php
use SnowSolution\AnyConfig\Traits\Configuration as Configuration;
$optionArray = Configuration::getOptionArray($field['source']);
$uniqueIdConfig = md5($field['path']);
$value = '';
if ($configValue) {
    $value = $configValue;
} else {
    if (array_key_exists('default_value', $field)) {
        $value = $field['default_value'];
    }
}
$comment = '';
if (array_key_exists('comment', $field)) {
    $comment = $field['comment'];
}
?>
@extends('anyconfig::field_type.layout', ['comment' => $comment])
<input id="{{$uniqueIdConfig}}" type="text" class="checkbox custom-toggle config-record" data-config-path="{{$field['path']}}" data-config-tag="input" value="{{$value}}"/>
<div class="field-label">
    <label for="">{{$field['label']}}</label>
</div>
<div class="toggleButtonContainer">
    <div class="toggleButton">
        <div class="toggleButtonSlide <?= $configValue ? 'active' : ''?>" data-config-id="{{$uniqueIdConfig}}"></div>
    </div>
</div>