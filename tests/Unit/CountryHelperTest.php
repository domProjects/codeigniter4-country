<?php

declare(strict_types=1);

/**
 * This file is part of domprojects/codeigniter4-country.
 *
 * (c) domProjects
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace domProjects\CodeIgniterCountry\Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * @internal
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CountryHelperTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Services::reset();
        $language = Services::language('en', false);
        $language->setLocale('en');
    }

    public function testCountryListReturnsTranslatedArray(): void
    {
        $countries = \countryList();

        $this->assertSame('France', $countries['FR']);
        $this->assertSame('United States', $countries['US']);
    }

    public function testCountryIsoToNameUsesUppercaseAndTrim(): void
    {
        $this->assertSame('France', \countryIsoToName(' fr '));
    }

    public function testCountryIsoToNameFallsBackToIsoCode(): void
    {
        $this->assertSame('ZZ', \countryIsoToName('zz'));
        $this->assertSame('', \countryIsoToName(''));
    }

    public function testCountryDropdownRendersSelectedOption(): void
    {
        $html = \countryDropdown('country', ['class' => 'form-select'], 'FR');

        $this->assertStringContainsString('name="country"', $html);
        $this->assertStringContainsString('class="form-select"', $html);
        $this->assertStringContainsString('value="FR" selected="selected"', $html);
        $this->assertStringContainsString('Select a country', $html);
    }

    public function testHelperUsesCurrentLocaleForTranslations(): void
    {
        $language = Services::language();

        $language->setLocale('fr');

        $countries = \countryList();
        $html      = \countryDropdown('country');

        $this->assertSame('France', $countries['FR']);
        $this->assertSame('États-Unis', $countries['US']);
        $this->assertStringContainsString('Sélectionner un pays', $html);
    }
}
