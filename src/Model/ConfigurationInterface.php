<?php
namespace SnowSolution\AnyConfig\Model;

interface ConfigurationInterface {

    public function isExist($path);

    public function save($config);

    public function create($configData);

    public function update($model, $data);

    public function get($path);

    public function getValue($path);
}