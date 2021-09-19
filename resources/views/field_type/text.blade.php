<?php
use SnowSolution\AnyConfig\Traits\Configuration as Configuration;
$uniqueIdConfig = md5($field['path']);
/**
 * Handle the value of config field
 */
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
<div class="field-label">
    <label for="">{{$field['label']}}</label>
</div>
<div>
    <input class="config-record" id="{{$uniqueIdConfig}}" type="text" name="" value="{{$value}}" data-config-path="{{$field['path']}}" data-config-tag="input"/>
</div>
