# Country for CodeIgniter 4

[![Packagist](https://img.shields.io/packagist/v/domprojects/codeigniter4-country?label=Packagist)](https://packagist.org/packages/domprojects/codeigniter4-country)
[![License](https://img.shields.io/github/license/domProjects/codeigniter4-country)](https://github.com/domProjects/codeigniter4-country/blob/main/LICENSE)
[![PHPUnit](https://img.shields.io/github/actions/workflow/status/domProjects/codeigniter4-country/phpunit.yml?branch=main&label=PHPUnit)](https://github.com/domProjects/codeigniter4-country/actions/workflows/phpunit.yml)
[![Psalm](https://img.shields.io/github/actions/workflow/status/domProjects/codeigniter4-country/psalm.yml?branch=main&label=Psalm)](https://github.com/domProjects/codeigniter4-country/actions/workflows/psalm.yml)
[![PHPStan](https://img.shields.io/github/actions/workflow/status/domProjects/codeigniter4-country/phpstan.yml?branch=main&label=PHPStan)](https://github.com/domProjects/codeigniter4-country/actions/workflows/phpstan.yml)

Translated country helper for CodeIgniter 4.

This package provides:

- a translated country list
- country name lookup from ISO code
- a ready-to-use country dropdown helper
- list of all countries with names and ISO 3166-1 codes

## Installation

```bash
composer require domprojects/codeigniter4-country
```

## Usage

Load the helper:

```php
helper('country');
```

Get the translated country list:

```php
$countries = countryList();
```

Translate an ISO code:

```php
$name = countryIsoToName('fr');
```

Render a dropdown:

```php
echo countryDropdown('country', ['class' => 'form-select'], 'FR');
```

## Available Functions

- `countryList(): array`
- `countryIsoToName(string $iso): string`
- `countryDropdown(string $name, array|string $extra = '', array|string $selected = ''): string`

## Locales

The package currently includes translated country files for:

- English
- French
- German

The helper uses the current CodeIgniter locale automatically through `lang()`.

Additional locales can be added over time.

## Package Structure

```text
src/
  Helpers/
    country_helper.php
  Language/
    <locale>/
      Country.php
```

## Language Source

The language files are based on data from:

- [@umpirsky](https://github.com/umpirsky)
- https://github.com/umpirsky/country-list

## License

MIT
