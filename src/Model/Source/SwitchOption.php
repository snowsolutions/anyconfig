<?php

namespace SnowSolution\AnyConfig\Model\Source;

class SwitchOption extends OptionAbstract implements OptionInterface {

    public function toOptionArray()
    {
        $optionArray = [
            [
                'label' => 'On',
                'value' => 1
            ],
            [
                'label' => 'Off',
                'value' => 0
            ]
        ];
        $this->addNAOptionValue($optionArray);
        return $optionArray;
    }

    public function toOption()
    {
        // TODO: Implement toOption() method.
    }
}