<?php
App::uses('PickerAppController', 'Picker.Controller');

class PickerController extends PickerAppController {
	
	public function country() {
		json_encode($this->Picker->countries);
	}
}