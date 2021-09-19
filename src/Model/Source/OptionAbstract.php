<?php

namespace SnowSolution\AnyConfig\Model\Source;

abstract class OptionAbstract
{
    public function addNAOptionValue(&$optionArray)
    {
        array_unshift($optionArray, [
            'label' => __('-- select --'),
            'value' => ''
        ]);
        return $optionArray;
    }
}