<?php
namespace SnowSolution\AnyConfig\Http\Controllers;
use App\Http\Controllers\Controller;
use SnowSolution\AnyConfig\Contract\ConfigurationRepositoryInterface;
use SnowSolution\AnyConfig\Helper\Init;
use SnowSolution\AnyConfig\Model\ConfigurationRepository;
use SnowSolution\AnyConfig\Model\Configuration;
use SnowSolution\AnyConfig\Traits\Bootstrap;

class ConfigurationController extends Controller {

    /**
     * @var Init
     */
    protected $init;
    /**
     * @var ConfigurationRepositoryInterface
     */
    protected $configProviderRepository;

    /**
     * @var ConfigurationRepository
     */
    protected $configurationRepository;

    /**
     * @var Configuration
     */
    protected $configuration;

    public function __construct(
        Init $init,
        ConfigurationRepositoryInterface $configProviderRepository,
        ConfigurationRepository $configurationRepository,
        \SnowSolution\AnyConfig\Model\Configuration $configuration
    )
    {
        $this->init = $init;
        $this->configProviderRepository = $configProviderRepository;
        $this->configurationRepository = $configurationRepository;
        $this->configuration = $configuration;
    }

    public function index()
    {
        return view('anyconfig::config')->with('init', $this->init);
    }

    /**
     * @param $tab
     * @param $section
     * @return array|string
     * @throws \Throwable
     */
    public function view($tab, $section)
    {
        $configurations = Configuration::all();
        $configurationFields = Bootstrap::$allConfiguration;
        $view = view('module::configurations.configuration');
        $view->with('renderField', function ($field) {
            return $this->configuration->renderConfigurationField($field);
        });
        $view->with('selectedTab', $tab);
        $view->with('selectedSectionId', $section);
        $view->with('configurations', $configurations);
        $view->with('configurationFields', $configurationFields);
        return $view->render();
    }
}