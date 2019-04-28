[![Build Status](https://travis-ci.org/SampicBE/laravel-adorable-avatars.svg?branch=master)](https://travis-ci.org/SampicBE/laravel-adorable-avatars)
[![Latest Stable Version](https://poser.pugx.org/sampic/laravel-adorableavatars/v/stable)](https://packagist.org/packages/sampic/laravel-adorableavatars)
[![Total Downloads](https://poser.pugx.org/sampic/laravel-adorableavatars/downloads)](https://packagist.org/packages/sampic/laravel-adorableavatars)

## Installation

Update your `composer.json` file to include this package as a dependency
```json
"sampic/laravel-adorableavatars": "~1.0"
```

> This package supports the [package discovery](https://laravel.com/docs/5.5/packages#package-discovery) functionality provided in Laravel 5.5, so registering the classes as described below is no longer necessary if you use Laravel 5.5.

Register the Adorable Avatars service provider by adding it to the providers array in the `config/app.php` file.
```php
Sampic\LaravelAdorableAvatars\LaravelAdorableAvatarsServiceProvider::class
```

Alias the Adorable Avatars facade by adding it to the aliases array in the `config/app.php` file.
```php
'aliases' => [
     'AdorableAvatars' => Sampic\LaravelAdorableAvatars\Facades\AdorableAvatars::class
]
```

### Configuration (optionnal !)

Update the config file to specify this size by default.

Allowed defaults:
- (boolean) `hash_string` (_default: true_): Hide the content that allows you to generate your avatar
- (boolean) `secure_url` (_default: true_): allows to use the API in https
- (integer) `size`: (_default: 80_) the default size of the generated avatar

## Usage

### AdorableAvatars::src(string string, int $size = null)

Returns the URL of the image that has been generated thanks to the character string
Can optionally pass in the size required as an integer. The size will be contained within a range between 1 - 512 as avatar will no return sizes greater than 512 of less than 1

```html
<!-- Show image with default dimensions -->
<img src="{{ AdorableAvatars::src('helloworld') }}">

<!-- Show image at 200px -->
<img src="{{ AdorableAvatars::src('helloworld', 200) }}">
```
