<?php
App::uses('AppController', 'Controller');

class PickerAppController extends AppController {

	public $helpers = array(
		'Html' => array('BoostCake.BoostCakeHtml'),
		'Form' => array('Picker.PickerForm'));
}