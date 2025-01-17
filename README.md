# PHPWakeOnLan

[![Travis Build Status](https://img.shields.io/travis/ashfieldjumper/PHPWakeOnLan/master.svg?style=flat-square)](https://travis-ci.org/ashfieldjumper/PHPWakeOnLan)
[![StyleCI Status](https://github.styleci.io/repos/128269954/shield?branch=master)](https://github.styleci.io/repos/128269954)
[![Codecov Status](https://img.shields.io/codecov/c/github/ashfieldjumper/PHPWakeOnLan.svg?style=flat-square)](https://codecov.io/gh/ashfieldjumper/PHPWakeOnLan)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/ashfieldjumper/php-wake-on-lan.svg?style=flat-square)](https://packagist.org/packages/ashfieldjumper/php-wake-on-lan)

Wake on lan target enabled devices by sending magic packets to them from PHP.

## Installation

Require the package using [composer](https://getcomposer.org/):

```bash
composer require AshFieldJumper/php-wake-on-lan
```

## Usage:

Normal PHP usage:

```php
<?php

use \ashfieldjumper\PHPWakeOnLan\PHPWakeOnLan;

$macAddresses = [
    '00:1B:2C:1C:DF:22',
    '01:1C:2C:1C:DF:13',
];

try {
    $wol = new PHPWakeOnLan();
    print_r($wol->wake($macAddresses));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
```

Laravel facade usage:

```php
<?php

use \ashfieldjumper\PHPWakeOnLan\Facades\PHPWakeOnLan;

$macAddresses = [
    '00:1B:2C:1C:DF:22',
    '01:1C:2C:1C:DF:13',
];

try {
    print_r(PHPWakeOnLan::wake($macAddresses));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
```

Example output:

```bash
Array
(
    [00:1B:2C:1C:DF:22] => Array
        (
            [result]     => OK
            [message]    => Magic packet sent to 00:1B:2C:1C:DF:22 through 255.255.255.255
            [bytes_sent] => 102
        )

    [01:1C:2C:1C:DF:13] => Array
        (
            [result]     => OK
            [message]    => Magic packet sent to 01:1C:2C:1C:DF:13 through 255.255.255.255
            [bytes_sent] => 102
        )
)
```

#### Laravel package config

You can publish laravel package configuration file running the command below:

```bash
php artisan vendor:publish --provider="ashfieldjumper\PHPWakeOnLan\PHPWakeOnLanServiceProvider" --tag="config"
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## External links

[Magic Packet Technology](http://support.amd.com/TechDocs/20213.pdf) -

White paper describing the specification and implementation of Magic Packet™
technology from AMD, one of its two co-developers.

## Credits

- [Diego González](https://github.com/ashfieldjumper)

## License

The MIT License ([MIT](./LICENSE.md)). Please see license file for more information.
