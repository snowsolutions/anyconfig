<?php
namespace SnowSolution\AnyConfig\Model\Source;

interface OptionInterface {
    public function toOptionArray();
    public function toOption();
}