# laravel-elasticsearch-mapping
A service provider for laravel with a fluent elasticsearch mapping builder.

[![Software license][ico-license]](LICENSE)
[![Travis][ico-travis]][link-travis]
[![Coveralls](https://coveralls.io/repos/github/triadev/laravel-elasticsearch-mapping/badge.svg?branch=master)](https://coveralls.io/github/triadev/laravel-elasticsearch-mapping?branch=master)
[![CodeCov](https://codecov.io/gh/triadev/laravel-elasticsearch-mapping/branch/master/graph/badge.svg)](https://codecov.io/gh/triadev/laravel-elasticsearch-mapping)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/badges/build.png?b=master)](https://scrutinizer-ci.com/g/triadev/laravel-elasticsearch-mapping/build-status/master)

[![Latest stable][ico-version-stable]][link-packagist]
[![Latest development][ico-version-dev]][link-packagist]
[![Monthly installs][ico-downloads-monthly]][link-downloads]
[![Total Downloads](https://img.shields.io/packagist/dt/triadev/laravel-elasticsearch-mapping.svg?style=flat-square)](https://packagist.org/packages/triadev/laravel-elasticsearch-mapping)

## Supported laravel versions
[![Laravel 5.5][icon-l55]][link-laravel]
[![Laravel 5.6][icon-l56]][link-laravel]
[![Laravel 5.7][icon-l57]][link-laravel]

## Supported elasticsearch versions
[![Elasticsearch 6.0][icon-e60]][link-elasticsearch]
[![Elasticsearch 6.1][icon-e61]][link-elasticsearch]
[![Elasticsearch 6.2][icon-e62]][link-elasticsearch]
[![Elasticsearch 6.3][icon-e63]][link-elasticsearch]
[![Elasticsearch 6.4][icon-e64]][link-elasticsearch]

## Installation

### Composer
> composer require triadev/laravel-elasticsearch-mapping

### Application
The package is registered through the package discovery of laravel and Composer.
>https://laravel.com/docs/5.7/packages

## Configuration
The elasticsearch client is generated via the package: [LaravelElasticsearchProvider](https://github.com/triadev/LaravelElasticsearchProvider).<br />
You can find the environment variables for the elasticsearch client in the readme of the package.

## Usage
This package offers a fluent mapping builder for elasticsearch. The entry point for each mapping build is a facade.
>Triadev\Es\Mapping\Facade\ElasticMapping

### Build mapping
```php
use Triadev\Es\Mapping\Mapping\Blueprint;

ElasticMapping::map(function (Blueprint $blueprint) {
    // fluent syntax
    $blueprint->keyword('EXAMPLE')->boost(5);

    // attributes array syntax
    $blueprint->keyword('EXAMPLE', [
        'boost' => 5
    ]);

    // settings are used when creating a new index
    $blueprint->settings([
        'index' => [
            'number_of_replicas' => 10,
            'number_of_shards' => 12,
            'refresh_interval' => '30s'
        ]
    ]);
}, INDEX, TYPE);
```

#### Create index
If the index does not exist a new index will be created.
This also includes the configuration from *$blueprint->settings()*.

#### Update index
If the index exists an update will be executed.

## Reporting Issues
If you do find an issue, please feel free to report it with GitHub's bug tracker for this project.

Alternatively, fork the project and make a pull request. :)

## Testing
1. docker-compose -f docker-compose.yml up
2. composer test

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits
- [Christopher Lorke][link-author]
- [All Contributors][link-contributors]

## Other

### Project related links
- [Wiki](https://github.com/triadev/laravel-elasticsearch-mapping/wiki)
- [Issue tracker](https://github.com/triadev/laravel-elasticsearch-mapping/issues)

### License
The code for laravel-elasticsearch-mapping is distributed under the terms of the MIT license (see [LICENSE](LICENSE)).

[ico-license]: https://img.shields.io/github/license/triadev/laravel-elasticsearch-mapping.svg?style=flat-square
[ico-version-stable]: https://img.shields.io/packagist/v/triadev/laravel-elasticsearch-mapping.svg?style=flat-square
[ico-version-dev]: https://img.shields.io/packagist/vpre/triadev/laravel-elasticsearch-mapping.svg?style=flat-square
[ico-downloads-monthly]: https://img.shields.io/packagist/dm/triadev/laravel-elasticsearch-mapping.svg?style=flat-square
[ico-travis]: https://travis-ci.org/triadev/laravel-elasticsearch-mapping.svg?branch=master

[link-packagist]: https://packagist.org/packages/triadev/laravel-elasticsearch-mapping
[link-downloads]: https://packagist.org/packages/triadev/laravel-elasticsearch-mapping/stats
[link-travis]: https://travis-ci.org/triadev/laravel-elasticsearch-mapping

[icon-l55]: https://img.shields.io/badge/Laravel-5.5-brightgreen.svg?style=flat-square
[icon-l56]: https://img.shields.io/badge/Laravel-5.6-brightgreen.svg?style=flat-square
[icon-l57]: https://img.shields.io/badge/Laravel-5.7-brightgreen.svg?style=flat-square

[icon-e60]: https://img.shields.io/badge/Elasticsearch-6.0-brightgreen.svg?style=flat-square
[icon-e61]: https://img.shields.io/badge/Elasticsearch-6.1-brightgreen.svg?style=flat-square
[icon-e62]: https://img.shields.io/badge/Elasticsearch-6.2-brightgreen.svg?style=flat-square
[icon-e63]: https://img.shields.io/badge/Elasticsearch-6.3-brightgreen.svg?style=flat-square
[icon-e64]: https://img.shields.io/badge/Elasticsearch-6.4-brightgreen.svg?style=flat-square

[link-laravel]: https://laravel.com
[link-elasticsearch]: https://www.elastic.co/
[link-author]: https://github.com/triadev
[link-contributors]: ../../contributors