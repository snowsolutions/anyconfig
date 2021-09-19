<?php
namespace SnowSolution\AnyConfig\Traits;

class Configuration {
    use Bootstrap;
    /**
     * @param $backendModelClass
     * @return \SnowSolution\AnyConfig\Model\Source\OptionInterface
     */
    public static function getOptionArray($backendModelClass)
    {
        /** @var \SnowSolution\AnyConfig\Model\Source\OptionInterface $optionModel */
        $optionModel = new $backendModelClass();
        return $optionModel->toOptionArray();
    }

    public static function getTabs()
    {
        $allConfigurations = Bootstrap::$allConfiguration;
        $tabs = $allConfigurations['tabs'];
        return $tabs;
    }
}