<?php

namespace SnowSolution\AnyConfig\Model\Source;

class SampleOption extends OptionAbstract implements OptionInterface {

    public function toOptionArray()
    {
        $optionArray = [
            [
                'label' => 'Option 1',
                'value' => 'option-1'
            ],
            [
                'label' => 'Option 2',
                'value' => 'option-2'
            ],
            [
                'label' => 'Option 3',
                'value' => 'option-3'
            ],
            [
                'label' => 'Option 4',
                'value' => 'option-4'
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