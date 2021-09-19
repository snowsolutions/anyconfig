<?php
use SnowSolution\AnyConfig\Traits\Configuration as Configuration;
if (is_array($field['source'])) {
    $optionArray = $field['source'];
} else {
    $optionArray = Configuration::getOptionArray($field['source']);
}
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
@extends('secomm.module.configuration::configurations.field.layout', ['comment' => $comment])
<div class="field-label">
    <label for="">{{$field['label']}}</label>
</div>
<div>
    <select class="config-record" name="" data-config-path="{{$field['path']}}" data-config-tag="select">
        @foreach ($optionArray as $option)
            <option <?= $option['value'] == $value ? 'selected' : '' ?> value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
    </select>
</div>