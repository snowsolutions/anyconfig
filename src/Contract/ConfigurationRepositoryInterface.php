<?php
namespace SnowSolution\AnyConfig\Contract;

interface ConfigurationRepositoryInterface
{
    /**
     * @return \SnowSolution\AnyConfig\ConfigProvider\Configuration
     */
    public function getConfigProvider();
}