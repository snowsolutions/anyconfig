<?php
namespace SnowSolution\AnyConfig\Model;

use SnowSolution\AnyConfig\ConfigProvider\Configuration;
class ConfigProviderRepository
{
    protected $configurationConfigProvider;

    public function __construct(
        Configuration $configurationConfigProvider
    )
    {
        $this->configurationConfigProvider = $configurationConfigProvider;
    }

    public function getConfigProvider()
    {
        return $this->configurationConfigProvider;
    }
}