<?php
App::uses('PickerAppModel', 'Picker.Model');

class Picker extends PickerAppModel {

	public function retrieve($data) {
		//return call_user_method($data);
	}
	
	public function countries() {
		return array(
			__('Afganistan'),
			__('Japan'),
			__('United States')
		);
	}
	
	public function timezone() {
		return array();
	}
}