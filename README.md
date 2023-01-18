# Anyconfig laravel package

## Overview

Anyconfig is a laravel package that will give you the application configuration mechanism to store configuration like SMTP credentials, Payment API token, Website theme colors, Enable / Disable toggle setting for multiple features...

Follow the architecture of key / value, you can query any configuration in the system by looking for the configuration path.

Static functions provided, you can get the configuration anywhere

## System requirement
- Laravel 6.x+
- PHP 7.2+
- Mysql 5.6+

## Installation
- Run ``composer require snowsolution/anyconfig`` to install package
- Run ``php artisan migrate`` to install package schema

## Usage

- To get a configuration value
```
$configValue = \SnowSolution\AnyConfig\Model\Configuration::getValue('path/to/your/config/');
```