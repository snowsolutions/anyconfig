<?php
$uniqueIdConfig = md5($field['path']);
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
    <div class="image-drop-zone">
        <div class="drop-zone-placeholder"></div>
    </div>
    <input id="{{$uniqueIdConfig}}" type="file">
</div>
