<?php

namespace SnowSolution\AnyConfig\Traits;

trait Bootstrap
{
    public static $allConfiguration;

    /**
     * Load all configuration.php file in modules directory and merge recursive all into an array
     */
    public static function init()
    {
        $appConfigurationPath = app_path('Configurations');
        $filesArray = scandir($appConfigurationPath);
        foreach ($filesArray as $index => $fileName) {
            if ($fileName == '.' || $fileName == '..' || $fileName == '.DS_Store') {
                unset($filesArray[$index]);
            }
        }


        $allConfigurationFiles = array_values($filesArray);
        $allConfiguration = [];
        foreach ($allConfigurationFiles as $configurationFile) {
            $configurationFilePath = $appConfigurationPath . "/" . $configurationFile;
            if (file_exists($configurationFilePath)) {
                $fileConfiguration = include $configurationFilePath;
                $allConfiguration = array_merge_recursive($allConfiguration, $fileConfiguration);
            }
        }

        self::$allConfiguration = $allConfiguration;
    }
}