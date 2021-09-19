<?php

namespace SnowSolution\AnyConfig\Model;

class ConfigurationRepository implements ConfigurationInterface {

    public function save($config)
    {
        // TODO: Implement save() method.
    }

    public function create($configData)
    {
        $configModel = new \SnowSolution\AnyConfig\Model\Configuration;
        $configModel->fill($configData);
        $configModel->save();
        return $configModel;
    }

    public function update($model, $data)
    {
        $model->fill($data);
        $model->save();
    }

    public function get($path)
    {
        $getConfigurationQuery = \SnowSolution\AnyConfig\Model\Configuration::all()
            ->where('path', $path);

        $configObject = $getConfigurationQuery->first();
        if (!is_null($configObject)) {
            return $configObject;
        } else {
            return null;
        }
    }

    public function getValue($path, $defaultValue = null)
    {
        $getConfigurationQuery = \SnowSolution\AnyConfig\Model\Configuration::all()
            ->where('path', $path);

        $configObject = $getConfigurationQuery->first();
        if (!is_null($configObject)) {
            $value = $configObject->value;
        } else {
            $value = $defaultValue;
        }
        return $value;
    }

    public function isExist($path)
    {
        $getConfigurationQuery = \SnowSolution\AnyConfig\Model\Configuration::all()
            ->where('path', $path);

        $configObject = $getConfigurationQuery->first();
        if (!is_null($configObject)) {
            return true;
        }
        return false;
    }

}