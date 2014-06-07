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
			__('Afganistan'),
			__('Albania'),
			__('Algeria'),
			__('Andorra'),
			__('Angola'),
			__('Antigua and Barbuda'),
			__('Argentina'),
			__('Armenia'),
			__('Aruba'),
			__('Australia'),
			__('Azerbaijan'),

		// B
		// -----------------
			__('Bahamas, The'),
			__('Bahrain'),
			__('Bangladesh'),
			__('Belarus'),
			__('Belguim'),
			__('Belize'),
			__('Benin'),
			__('Bhutan'),
			__('Bolivia'),
			__('Bosnia and Herzegovina'),
			__('Botswana'),
			__('Brazil'),
			__('Brunei'),
			__('Bulgaria'),
			__('Burkina Faso'),
			__('Burma'),
			__('Burundi'),

		// C
		// -----------------
			__('Cambodia'),
			__('Cameroon'),
			__('Canada'),
			__('Cape Verde'),
			__('Central African Republic'),
			__('Chad'),
			__('Chile'),
			__('China'),
			__('Colombia'),
			__('Comoros'),
			__('Congo, Democratic Republic of the'),
			__('Congo, Republic of the'),
			__('Costa Rica'),
			__("Cote d'Ivoire"),
			__('Croatia'),
			__('Cuba'),
			__('Curacao'),
			__('Cyprus'),
			__('Czech Republic'),

		// D
		// -----------------
			__('Denmark'),
			__('Djibouti'),	//?
			__('Dominica'),
			__('Dominican Republic'),

		// E
		// -----------------
			__('East Timor'),
			__('Ecuador'),
			__('Egypt'),
			__('El Salvador'),
			__('Equatorial Guinea'),
			__('Eritrea'),
			__('Estonia'),
			__('Ethiopia'),

		// F
		// -----------------
			__('Fiji'),
			__('Finland'),
			__('France'),

		// G
		// -----------------
			__('Gabon'),
			__('Gambia, The'),
			__('Georgia'),
			__('Germany'),
			__('Ghana'),
			__('Greece'),
			__('Grenada'),
			__('Guatemala'),
			__('Guinea'),
			__('Guinea-Bissau'),
			__('Guyana'),

		// H
		// -----------------
			__('Haiti'),
			__('Holy See'),
			__('Honduras'),
			__('Hong Kong'),
			__('Hungary'),

		// I
		// -----------------
			__('Iceland'),
			__('India'),
			__('Indonesia'),
			__('Iran'),
			__('Iraq'),
			__('Ireland'),
			__('Islael'),
			__('Italy'),

		// J
		// -----------------
			__('Jamaica'),
			__('Japan'),
			__('Jordan'),

		// K
		// -----------------
			__('Kazakhstan'),
			__('Kenya'),
			__('Kiribati'),
			__('Korea, North'),
			__('Korea, South'),
			__('Kosovo'),
			__('Kuwait'),
			__('Kyrgyzstan'),

		// L
		// -----------------
			__('Laos'),
			__('Lativia'),
			__('Lebanon'),
			__('Lesotho'),
			__('Liberia'),
			__('Liechtenstein'),
			__('Lithuania'),
			__('Luxembourg'),

		// M
		// -----------------
			__('Macau'),
			__('Macedonia'),
			__('Madagascar'),
			__('Malawi'),
			__('Malaysia'),
			__('Maldives'),
			__('Mali'),
			__('Malta'),
			__('Marshall Island'),
			__('Mauritania'),
			__('Mauritius'),
			__('Mexico'),
			__('Micronesia'),
			__('Moldova'),
			__('Monaco'),
			__('Mongolia'),
			__('Montenegro'),
			__('Morocco'),
			__('Mozambique'),

		// N
		// -----------------
			__('Namibia'),
			__('Nauru'),
			__('Nepal'),
			__('Netherlands'),
			__('Netherlands Antilles'),
			__('New Zealand'),
			__('Nicaragua'),
			__('Niger'),
			__('Nigeria'),
			// North Korea Omit
			__('Norway'),

		// O
		// -----------------
			__('Oman'),

		// P
		// -----------------
			__('Pakistan'),
			__('Palau'),
			__('Palestinan Territories'),
			__('Panama'),
			__('Papua New Guinea'),
			__('Paraguay'),
			__('Peru'),
			__('Philippines'),
			__('Poland'),
			__('Portugal'),

		// Q
		// -----------------
			__('Qatar'),

		// R
		// -----------------
			__('Romania'),
			__('Russia'),
			__('Rwanda'),

		// S
		// -----------------
			__('Saint Kitts and Nevis'),
			__('Saint Lucia'),
			__('Saint Vincent and he Grenadines'),
			__('Samoa'),
			__('San Marino'),
			__('Sao Tome and Principe'), // ?
			__('Saudi Arabia'),
			__('Senegal'),
			__('Serbia'),
			__('Seychelles'),
			__('Sierra Leone'),
			__('Singapore'),
			__('Sint Maarten'),
			__('Slovakia'),
			__('Slovenia'),
			__('Solomon Island'),
			__('Somalia'),
			__('South Africa'),
			// South Korea Omit
			__('South Sudan'),
			__('Spain'),
			__('Sri Lanka'),
			__('Sudan'),
			__('Suriname'),
			__('Swaziland'),
			__('Sweden'),
			__('Swizerland'),
			__('Syria'),

		// T
		// -----------------
			__('Taiwan'),
			__('Tajikistan'),
			__('Tanzania'),
			__('Thailand'),
			__('Timor-Leste'),
			__('Togo'),
			__('Tonga'),
			__('Trinidad and Tobago'),
			__('Tunisia'),
			__('Turkey'),
			__('Turkmenistan'),
			__('Tuvalu'),

		// U
		// -----------------
			__('Uganda'),
			__('Ukraine'),
			__('United Arab Emirates'),
			__('United Kingdom'),
			__('Uruguay'),
			__('Uzbekistan'),

		// V
		// -----------------
			__('Vanuatu'),
			__('Venezuela'),
			__('Vietnam'),

		// Y
		// -----------------
			__('Yemen'),

		// Z
		// -----------------
			__('Zambia'),
			__('Zimbabwe'));
		///@formatter:on
	}


	public function getProvince($country) {

		switch ($country) {
		case 'Japan':
			///@formatter:off
			return array(
			// Hokkaido
				__('Hokkaido'),
			// Tohoku
				__('Aomori'),
				__('Iwate'),
				__('Miyagi'),
				__('Akita'),
				__('Yamagata'),
				__('Fukushima'),
				__('Ibaraki'),
				__('Tochigi'),
				__('Gunma'),
			// Kanto
				__('Saitama'),
				__('Chiba'),
				__('Tokyo'),
				__('Kanagawa'),
			// Hokuriku
				__('Nigata'),
				__('Toyama'),
				__('Ishikawa'),
				__('Fukui'),
				__('Yamanashi'),
				__('Nagano'),
			// Tokai
				__('Gifu'),
				__('Shizuoka'),
				__('Aichi'),
				__('Mie'),
			// Kinki
				__('Shiga'),
				__('Kyoto'),
				__('Osaka'),
				__('Hyogo'),
				__('Nara'),
				__('Wakayama'),
			// Central japan area
				__('Tottori'),
				__('Shimane'),
				__('Okayama'),
				__('Hiroshima'), // CARP
				__('Yamaguchi'),
			// 4 countries
				__('Tokushima'),
				__('Kagawa'),	// UDON
				__('Ehime'),	// MIKAN
				__('Kochi'),
			// 9 states
				__('Fukuoka'),
				__('Saga'),		// Romancing
				__('Nagasaki'),
				__('Kumamoto'),	// Kumamon
				__('Oita'),
				__('Miyazaki'),
				__('Kagoshima'),
				__('Okinawa'));
			///@formatter:on
		default:
			return array();
		}
	}
}