<?php

namespace SnowSolution\AnyConfig\Helper;

use SnowSolution\AnyConfig\Model\ConfigProviderRepository;
use SnowSolution\AnyConfig\Model\Configuration;
use SnowSolution\AnyConfig\Model\ConfigurationRepository;
use SnowSolution\AnyConfig\Traits\Configuration as AnyConfigurationTrait;
/**
 * Class Init
 * @package SnowSolution\AnyConfig\Helper
 */
class Init {

    /**
     * @var \SnowSolution\AnyConfig\Contract\ConfigurationRepositoryInterface
     */
    protected $configProviderRepository;
    protected $configurationRepository;
    protected $configuration;


    public function __construct(
        ConfigProviderRepository $configProviderRepository,
        ConfigurationRepository $configurationRepository,
        Configuration $configuration
    )
    {
        $this->configProviderRepository = $configProviderRepository;
        $this->configurationRepository = $configurationRepository;
        $this->configuration = $configuration;
    }

    public function renderConfigPage()
    {
        $configProvider = $this->configProviderRepository->getConfigProvider();
        return view('anyconfig::configPage')
            ->with('defaultTab', $this->configuration->getValue('core/backend/general/default_tab'))
            ->with('defaultSection', $this->configuration->getValue('core/backend/general/default_section'))
            ->with('configurationTabs', AnyConfigurationTrait::getTabs())
            ->with('config', $configProvider->getConfig());
    }
}