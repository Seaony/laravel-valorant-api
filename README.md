<h1 align="center">Laravel Valorant Api</h1>

<p align="center">🍯 A Valorant api wrapper for Laravel.</p>

<p align="center">
<a href="https://packagist.org/packages/seaony/laravel-valorant-api"><img src="https://poser.pugx.org/seaony/laravel-valorant-api/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/seaony/laravel-valorant-api"><img src="https://poser.pugx.org/seaony/laravel-valorant-api/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://scrutinizer-ci.com/g/seaony/laravel-valorant-api/build-status/master"><img src="https://scrutinizer-ci.com/g/seaony/laravel-valorant-api/badges/build.png?b=master" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/seaony/laravel-valorant-api/?branch=master"><img src="https://scrutinizer-ci.com/g/seaony/laravel-valorant-api/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
<a href="https://packagist.org/packages/seaony/laravel-valorant-api"><img src="https://poser.pugx.org/seaony/laravel-valorant-api/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/seaony/laravel-valorant-api"><img src="https://poser.pugx.org/seaony/laravel-valorant-api/license" alt="License"></a>
</p>

## Installing

```shell
$ composer require seaonye/laravel-valorant-api
```


## Configuration

```shell
php artisan vendor:publish --provider="Seaony\ValorantApi\ValorantServiceProvider"
```



## Usage

```php
use Seaony\ValorantApi\Valorant;

$client = new Valorant();

$client->authCookies();
```

API Document：[https://valapidocs.techchrism.me/](https://valapidocs.techchrism.me/)



## 🧶 Project supported by JetBrains

Many thanks to Jetbrains for kindly providing a license for me to work on this and other open-source projects.

[![](https://resources.jetbrains.com/storage/products/company/brand/logos/jb_beam.svg)](https://www.jetbrains.com/?from=https://github.com/overtrue)




## 🍯 Acknowledgements
**Thank you to the following people and repositories:**

- **[RumbleMike/ValorantClientAPI](https://github.com/RumbleMike/ValorantClientAPI) for the API that makes it all possible.**
- **[techchrism/valorant-api-docs](https://github.com/techchrism/valorant-api-docs) for the detailed documentation.**
- **[Valorant-API.com](https://valorant-api.com) for providing assets.**



## License

MIT
