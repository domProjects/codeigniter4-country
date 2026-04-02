# domProjects CodeIgniter 4 Country

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
