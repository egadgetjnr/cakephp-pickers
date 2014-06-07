<?php
///@formatter:off
/*
 * The MIT License (MIT)
 * Copyright (c) 2014 rcsv
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
///@formater:on
App::uses('PickerAppModel', 'Picker.Model');

class Picker extends PickerAppModel {
	
	/**
	 * `getTimezone()` method generate the timezone list PHP defined via 
	 * `DateTimeZone::listIdentifiers()` method.
	 * 
	 * @param string $query
	 */
	public function getTimezone($query = null) {
		if (!isset($query)) return DateTimeZone::listIdentifiers();
		
		// trim timezone list before return when $query string is not null.
		return array_filter(DateTimeZone::listIdentifiers(), function($var) use ($query) {
			return FALSE !== stripos($var, $query);
		});
	}
	
	/**
	 * `getCountryList()` method returns countries list. Country list refered by
	 * A-Z List of Country and Other Area Pages. 
	 * 
	 * @see http://www.state.gov/misc/list/
	 */
	public function getCountryList() {
		///@formatter:off
		return array(

		// A
		// -----------------
			__d('Picker', 'Afganistan'),
			__d('Picker', 'Albania'),
			__d('Picker', 'Algeria'),
			__d('Picker', 'Andorra'),
			__d('Picker', 'Angola'),
			__d('Picker', 'Antigua and Barbuda'),
			__d('Picker', 'Argentina'),
			__d('Picker', 'Armenia'),
			__d('Picker', 'Aruba'),
			__d('Picker', 'Australia'),
			__d('Picker', 'Azerbaijan'),

		// B
		// -----------------
			__d('Picker', 'Bahamas, The'),
			__d('Picker', 'Bahrain'),
			__d('Picker', 'Bangladesh'),
			__d('Picker', 'Belarus'),
			__d('Picker', 'Belguim'),
			__d('Picker', 'Belize'),
			__d('Picker', 'Benin'),
			__d('Picker', 'Bhutan'),
			__d('Picker', 'Bolivia'),
			__d('Picker', 'Bosnia and Herzegovina'),
			__d('Picker', 'Botswana'),
			__d('Picker', 'Brazil'),
			__d('Picker', 'Brunei'),
			__d('Picker', 'Bulgaria'),
			__d('Picker', 'Burkina Faso'),
			__d('Picker', 'Burma'),
			__d('Picker', 'Burundi'),

		// C
		// -----------------
			__d('Picker', 'Cambodia'),
			__d('Picker', 'Cameroon'),
			__d('Picker', 'Canada'),
			__d('Picker', 'Cape Verde'),
			__d('Picker', 'Central African Republic'),
			__d('Picker', 'Chad'),
			__d('Picker', 'Chile'),
			__d('Picker', 'China'),
			__d('Picker', 'Colombia'),
			__d('Picker', 'Comoros'),
			__d('Picker', 'Congo, Democratic Republic of the'),
			__d('Picker', 'Congo, Republic of the'),
			__d('Picker', 'Costa Rica'),
			__("Cote d'Ivoire"),
			__d('Picker', 'Croatia'),
			__d('Picker', 'Cuba'),
			__d('Picker', 'Curacao'),
			__d('Picker', 'Cyprus'),
			__d('Picker', 'Czech Republic'),

		// D
		// -----------------
			__d('Picker', 'Denmark'),
			__d('Picker', 'Djibouti'),	//?
			__d('Picker', 'Dominica'),
			__d('Picker', 'Dominican Republic'),

		// E
		// -----------------
			__d('Picker', 'East Timor'),
			__d('Picker', 'Ecuador'),
			__d('Picker', 'Egypt'),
			__d('Picker', 'El Salvador'),
			__d('Picker', 'Equatorial Guinea'),
			__d('Picker', 'Eritrea'),
			__d('Picker', 'Estonia'),
			__d('Picker', 'Ethiopia'),

		// F
		// -----------------
			__d('Picker', 'Fiji'),
			__d('Picker', 'Finland'),
			__d('Picker', 'France'),

		// G
		// -----------------
			__d('Picker', 'Gabon'),
			__d('Picker', 'Gambia, The'),
			__d('Picker', 'Georgia'),
			__d('Picker', 'Germany'),
			__d('Picker', 'Ghana'),
			__d('Picker', 'Greece'),
			__d('Picker', 'Grenada'),
			__d('Picker', 'Guatemala'),
			__d('Picker', 'Guinea'),
			__d('Picker', 'Guinea-Bissau'),
			__d('Picker', 'Guyana'),

		// H
		// -----------------
			__d('Picker', 'Haiti'),
			__d('Picker', 'Holy See'),
			__d('Picker', 'Honduras'),
			__d('Picker', 'Hong Kong'),
			__d('Picker', 'Hungary'),

		// I
		// -----------------
			__d('Picker', 'Iceland'),
			__d('Picker', 'India'),
			__d('Picker', 'Indonesia'),
			__d('Picker', 'Iran'),
			__d('Picker', 'Iraq'),
			__d('Picker', 'Ireland'),
			__d('Picker', 'Islael'),
			__d('Picker', 'Italy'),

		// J
		// -----------------
			__d('Picker', 'Jamaica'),
			__d('Picker', 'Japan'),
			__d('Picker', 'Jordan'),

		// K
		// -----------------
			__d('Picker', 'Kazakhstan'),
			__d('Picker', 'Kenya'),
			__d('Picker', 'Kiribati'),
			__d('Picker', 'Korea, North'),
			__d('Picker', 'Korea, South'),
			__d('Picker', 'Kosovo'),
			__d('Picker', 'Kuwait'),
			__d('Picker', 'Kyrgyzstan'),

		// L
		// -----------------
			__d('Picker', 'Laos'),
			__d('Picker', 'Lativia'),
			__d('Picker', 'Lebanon'),
			__d('Picker', 'Lesotho'),
			__d('Picker', 'Liberia'),
			__d('Picker', 'Liechtenstein'),
			__d('Picker', 'Lithuania'),
			__d('Picker', 'Luxembourg'),

		// M
		// -----------------
			__d('Picker', 'Macau'),
			__d('Picker', 'Macedonia'),
			__d('Picker', 'Madagascar'),
			__d('Picker', 'Malawi'),
			__d('Picker', 'Malaysia'),
			__d('Picker', 'Maldives'),
			__d('Picker', 'Mali'),
			__d('Picker', 'Malta'),
			__d('Picker', 'Marshall Island'),
			__d('Picker', 'Mauritania'),
			__d('Picker', 'Mauritius'),
			__d('Picker', 'Mexico'),
			__d('Picker', 'Micronesia'),
			__d('Picker', 'Moldova'),
			__d('Picker', 'Monaco'),
			__d('Picker', 'Mongolia'),
			__d('Picker', 'Montenegro'),
			__d('Picker', 'Morocco'),
			__d('Picker', 'Mozambique'),

		// N
		// -----------------
			__d('Picker', 'Namibia'),
			__d('Picker', 'Nauru'),
			__d('Picker', 'Nepal'),
			__d('Picker', 'Netherlands'),
			__d('Picker', 'Netherlands Antilles'),
			__d('Picker', 'New Zealand'),
			__d('Picker', 'Nicaragua'),
			__d('Picker', 'Niger'),
			__d('Picker', 'Nigeria'),
			// North Korea Omit
			__d('Picker', 'Norway'),

		// O
		// -----------------
			__d('Picker', 'Oman'),

		// P
		// -----------------
			__d('Picker', 'Pakistan'),
			__d('Picker', 'Palau'),
			__d('Picker', 'Palestinan Territories'),
			__d('Picker', 'Panama'),
			__d('Picker', 'Papua New Guinea'),
			__d('Picker', 'Paraguay'),
			__d('Picker', 'Peru'),
			__d('Picker', 'Philippines'),
			__d('Picker', 'Poland'),
			__d('Picker', 'Portugal'),

		// Q
		// -----------------
			__d('Picker', 'Qatar'),

		// R
		// -----------------
			__d('Picker', 'Romania'),
			__d('Picker', 'Russia'),
			__d('Picker', 'Rwanda'),

		// S
		// -----------------
			__d('Picker', 'Saint Kitts and Nevis'),
			__d('Picker', 'Saint Lucia'),
			__d('Picker', 'Saint Vincent and he Grenadines'),
			__d('Picker', 'Samoa'),
			__d('Picker', 'San Marino'),
			__d('Picker', 'Sao Tome and Principe'), // ?
			__d('Picker', 'Saudi Arabia'),
			__d('Picker', 'Senegal'),
			__d('Picker', 'Serbia'),
			__d('Picker', 'Seychelles'),
			__d('Picker', 'Sierra Leone'),
			__d('Picker', 'Singapore'),
			__d('Picker', 'Sint Maarten'),
			__d('Picker', 'Slovakia'),
			__d('Picker', 'Slovenia'),
			__d('Picker', 'Solomon Island'),
			__d('Picker', 'Somalia'),
			__d('Picker', 'South Africa'),
			// South Korea Omit
			__d('Picker', 'South Sudan'),
			__d('Picker', 'Spain'),
			__d('Picker', 'Sri Lanka'),
			__d('Picker', 'Sudan'),
			__d('Picker', 'Suriname'),
			__d('Picker', 'Swaziland'),
			__d('Picker', 'Sweden'),
			__d('Picker', 'Swizerland'),
			__d('Picker', 'Syria'),

		// T
		// -----------------
			__d('Picker', 'Taiwan'),
			__d('Picker', 'Tajikistan'),
			__d('Picker', 'Tanzania'),
			__d('Picker', 'Thailand'),
			__d('Picker', 'Timor-Leste'),
			__d('Picker', 'Togo'),
			__d('Picker', 'Tonga'),
			__d('Picker', 'Trinidad and Tobago'),
			__d('Picker', 'Tunisia'),
			__d('Picker', 'Turkey'),
			__d('Picker', 'Turkmenistan'),
			__d('Picker', 'Tuvalu'),

		// U
		// -----------------
			__d('Picker', 'Uganda'),
			__d('Picker', 'Ukraine'),
			__d('Picker', 'United Arab Emirates'),
			__d('Picker', 'United Kingdom'),
			__d('Picker', 'Uruguay'),
			__d('Picker', 'Uzbekistan'),

		// V
		// -----------------
			__d('Picker', 'Vanuatu'),
			__d('Picker', 'Venezuela'),
			__d('Picker', 'Vietnam'),

		// Y
		// -----------------
			__d('Picker', 'Yemen'),

		// Z
		// -----------------
			__d('Picker', 'Zambia'),
			__d('Picker', 'Zimbabwe'));
		///@formatter:on
	}


	public function getProvince($country) {

		switch ($country) {
		case 'Japan':
			///@formatter:off
			return array(
			// Hokkaido
				__d('Picker', 'Hokkaido'),
			// Tohoku
				__d('Picker', 'Aomori'),
				__d('Picker', 'Iwate'),
				__d('Picker', 'Miyagi'),
				__d('Picker', 'Akita'),
				__d('Picker', 'Yamagata'),
				__d('Picker', 'Fukushima'),
				__d('Picker', 'Ibaraki'),
				__d('Picker', 'Tochigi'),
				__d('Picker', 'Gunma'),
			// Kanto
				__d('Picker', 'Saitama'),
				__d('Picker', 'Chiba'),
				__d('Picker', 'Tokyo'),
				__d('Picker', 'Kanagawa'),
			// Hokuriku
				__d('Picker', 'Nigata'),
				__d('Picker', 'Toyama'),
				__d('Picker', 'Ishikawa'),
				__d('Picker', 'Fukui'),
				__d('Picker', 'Yamanashi'),
				__d('Picker', 'Nagano'),
			// Tokai
				__d('Picker', 'Gifu'),
				__d('Picker', 'Shizuoka'),
				__d('Picker', 'Aichi'),
				__d('Picker', 'Mie'),
			// Kinki
				__d('Picker', 'Shiga'),
				__d('Picker', 'Kyoto'),
				__d('Picker', 'Osaka'),
				__d('Picker', 'Hyogo'),
				__d('Picker', 'Nara'),
				__d('Picker', 'Wakayama'),
			// Central japan area
				__d('Picker', 'Tottori'),
				__d('Picker', 'Shimane'),
				__d('Picker', 'Okayama'),
				__d('Picker', 'Hiroshima'), // CARP
				__d('Picker', 'Yamaguchi'),
			// 4 countries
				__d('Picker', 'Tokushima'),
				__d('Picker', 'Kagawa'),	// UDON
				__d('Picker', 'Ehime'),	// MIKAN
				__d('Picker', 'Kochi'),
			// 9 states
				__d('Picker', 'Fukuoka'),
				__d('Picker', 'Saga'),		// Romancing
				__d('Picker', 'Nagasaki'),
				__d('Picker', 'Kumamoto'),	// Kumamon
				__d('Picker', 'Oita'),
				__d('Picker', 'Miyazaki'),
				__d('Picker', 'Kagoshima'),
				__d('Picker', 'Okinawa'));
			///@formatter:on
		default:
			return array();
		}
	}
}
