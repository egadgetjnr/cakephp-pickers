<?php
App::uses('Controller', 'Controller');

class PickerAppController extends Controller {

	public $helpers = array(
		'Html' => array('BoostCake.BoostCakeHtml'),
		'Form' => array('Picker.PickerForm'));
}