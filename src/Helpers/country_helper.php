<?php

/**
 * This file is part of domprojects/codeigniter4-country.
 *
 * (c) domProjects
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

if (! function_exists('countryList')) {
    /**
     * Returns the translated list of countries for the current locale.
     *
     * The array keys are ISO 3166-1 alpha-2 country codes and the values
     * are the translated country names loaded from the package language files.
     *
     * @return array<string, string>
     */
    function countryList(): array
    {
        /** @var array<string, string>|mixed $countryList */
        $countryList = lang('Country.list');

        if (! is_array($countryList)) {
            return [];
        }

        return $countryList;
    }
}

if (! function_exists('countryIsoToName')) {
    /**
     * Returns the translated country name for an ISO 3166-1 alpha-2 code.
     *
     * The provided code is trimmed and normalized to uppercase before lookup.
     * If no translation is found, the normalized ISO code is returned as-is.
     *
     * @param string $iso Two-letter ISO country code.
     *
     * @return string Translated country name or the normalized ISO code.
     */
    function countryIsoToName(string $iso): string
    {
        $iso = strtoupper(trim($iso));

        if ($iso === '') {
            return '';
        }

        return countryList()[$iso] ?? $iso;
    }
}

if (! function_exists('countryDropdown')) {
    /**
     * Builds a country dropdown field using CodeIgniter's form helper.
     *
     * The first option is an empty placeholder translated for the current
     * locale, followed by the full localized country list.
     *
     * @param string                           $name     Form field name attribute.
     * @param array<string, string>|string     $extra    Additional HTML attributes as an array or raw string.
     * @param array<int|string, string>|string $selected Selected option value or list of selected values.
     *
     * @return string Rendered HTML <select> element.
     */
    function countryDropdown(string $name, $extra = '', $selected = ''): string
    {
        if (! function_exists('form_dropdown')) {
            helper('form');
        }

        $options = countryList();

        // Leave the selection empty so CodeIgniter can reuse POST data automatically.
        $selectedValue = $selected === '' ? [] : $selected;

        return form_dropdown($name, ['' => lang('Country.selectCountry')] + $options, $selectedValue, $extra);
    }
}
