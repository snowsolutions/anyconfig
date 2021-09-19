<?php
namespace SnowSolution\AnyConfig\ConfigProvider;

class Configuration {
    protected $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    public function getConfig()
    {
        return  [
            'myNameInConfigProvider' => 'Frank Nguyen',
            'csrf_token' => csrf_token()
        ];
    }
}