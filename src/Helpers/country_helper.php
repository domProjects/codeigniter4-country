<?php

if (! function_exists('countryList')) {
    /**
     * Returns the translated list of countries.
     *
     * @return array<string, string>
     */
    function countryList(): array
    {
        $countryList = lang('Country.list');

        return is_array($countryList) ? $countryList : [];
    }
}

if (! function_exists('countryIsoToName')) {
    /**
     * Returns the translated country name from an ISO 3166-1 alpha-2 code.
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
     * @param string       $name     Field name
     * @param array|string $extra    Extra attributes to be added to the tag either as an array or a literal string
     * @param array|string $selected List of fields to mark with the selected attribute
     */
    function countryDropdown(string $name, $extra = '', $selected = ''): string
    {
        if (! function_exists('form_dropdown')) {
            helper('form');
        }

        $options = countryList();

        // Leave the selection empty so CodeIgniter can reuse POST data automatically.
        $selectedValue = ($selected === '' || $selected === null) ? [] : $selected;

        return form_dropdown($name, ['' => lang('Country.selectCountry')] + $options, $selectedValue, $extra);
    }
}
