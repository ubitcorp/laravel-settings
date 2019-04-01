[![Latest Stable Version](https://poser.pugx.org/ubitcorp/laravel-settings/v/stable)](https://packagist.org/packages/ubitcorp/laravel-settings)
[![Total Downloads](https://poser.pugx.org/ubitcorp/laravel-settings/downloads)](https://packagist.org/packages/ubitcorp/laravel-settings)
[![License](https://poser.pugx.org/ubitcorp/laravel-settings/license)](https://packagist.org/packages/ubitcorp/laravel-settings)
[![Monthly Downloads](https://poser.pugx.org/ubitcorp/laravel-settings/d/monthly)](https://packagist.org/packages/ubitcorp/laravel-settings)
[![Daily Downloads](https://poser.pugx.org/ubitcorp/laravel-settings/d/daily)](https://packagist.org/packages/ubitcorp/laravel-settings)


# Laravel Settings
It provides a settings model that can be used with trait on any model for Laravel project

# Installation
Via Composer

``` bash
$ composer require ubitcorp/laravel-settings
``` 

If you want to use different table name instead of **settings**

``` bash
$ php artisan vendor:publish --provider="ubitcorp\Settings\ServiceProvider" 
``` 

Then you can change config/settings.php configuration file for table name. Then you should run:
``` bash
$ php artisan migrate
``` 

# Usage
This package provides the **hasSettings** trait that can be included any model. After that the functions below can be used:

````
settings()
addSetting($keyword, $value)
addSettings($settings)
removeSetting($keyword)
removeSettings($keywords)
syncSettings($settings)
valueofSetting($keyword)
valueOfSettingAsArray($keyword)
````



[ico-version]: https://img.shields.io/packagist/v/ubitcorp/settings.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ubitcorp/settings.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/ubitcorp/laravel-settings
[link-downloads]: https://packagist.org/packages/ubitcorp/laravel-settings
[link-author]: https://github.com/ubitcorp 