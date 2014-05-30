<?php
App::uses('AppModel', 'Model');
App::uses('PickerAppModel', 'Picker.Model');

class Picker extends PickerAppModel {
	
	public $countries;
	
	public function __construct($id = false, $table = null, $ds = null) {
		
		$this->countries = array(
		// A
			'Afganistan',
			'Albania',
			'Algeria',
			'American Samoa',
			'Angola',
			'Anguilla',
			'Antarctica',
			'Antigua and Barbuda',
			'Argentina',
			'Armenia',
			'Aruba',
			'Australia',
			'Austria',
			'Azerbaijan',
		// B
			'Bahamas',
			'Bahrain',
			'Bangladesh',
			'Barbados',
			'Belarus',
			'Belguim',
			'Belize',
			'Benin',
			'Bermuda',
			'Bhutan',
			'Bolivia',
			'Bosnia and Herzegowina',
			'Botswana',
			'Bouvet Island',
			'Brazil',
			'British Indian Ocean Territory',
			'Brunei Darussalam',
			'Bulgaria',
			'Burkina Faso',
			'Burundi',
		// C
			'Cambodia',
			'Cameroon',
			'Canada',
			'Cape Verde',
			'Cayman Islands',
			'Central African Republic',
			'Chad',
			'Chile',
			'China',
			'Chirstmas Island',
			'Cocos (Keeling) Islands',
			'Colombia',
			'Comoros',
			'Congo',
			'Congo, the Democratic Republic of the',
			'Cook Islands',
			'Costa Rica',
			'Cote d\'Ivoire',
			'Croatia (Hrvatska)',
			'Cuba',
			'Cyprus',
			'Czech Republic',
			'Denmark',
		// D
			'Djibouti',
			'Japanese',
			'United States'
		);
		
		parent::__construct($id, $table, $ds);
	}
	
}
