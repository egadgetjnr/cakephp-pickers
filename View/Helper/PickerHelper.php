<?php
App::uses('FormHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');

/**
 * Picker Helper
 *
 * Generate form input
 */
class PickerHelper extends AppHelper {

	// pickers DEFAULT OPTIONS
	public $pickersDefault = array(
		'div' => array(
			'class' => 'form-group'),
		'type' => 'text',
		'class' => 'form-control');

	// javascript source files
	public $jsfiles = array(
		'jquery' => 'jquery-2.1.0.min',
		'bootstrap' => 'bootstrap.min',
		'color' => 'jquery.minicolors'
	);

	// css files
	public $cssfiles = array(
		'bootstrap' => 'bootstrap.min',
		'color' => 'jquery.minicolors'
	);

	public $helpers = array('Form', 'Html');

	// Constructor
	public function __construct($View, $settings = array()) {
		$this->serial_number = 1;
		parent::__construct($View, $settings);
	}

	/**
	 * Generate ColorPicker via bootstrap-colorpicker
	 *
	 * @param string $fieldName form field name
	 * @param array $options options
	 */
	public function color($fieldName, $options = array()) {
		$this->loadfiles(array('jquery', 'bootstrap', 'color');
		$pickerOption = json_encode(isset($options['pickerOption']) ? $options['pickerOption'] : array(), JSON_FORCE_OBJECT);
		unset($options['pickerOption']);
		$this->merge_options($options);
		$this->options = $this->appendClass('minicolors');
		$this->options['wrapInput'] = false;
		echo $this->Html->scriptBlock("\$('input.minicolors).minicolors(${pickerOption})", self::$AIF);
		return $this->Form->input($fieldName, $this->options);
	}

	// PRIVATE FUNCTIONS
	// --------------------------------------------------------------------

	private function merge_options($options = array()) {
		$this->options = array_merge($this->pickersDefault, $options);
		$options = $this->appendClass('form-control');
	}

	private function appendClass($classValue) {
		if (empty($this->options['class']) || strstr($this->options['class'], $classValue) === false) {
			$this->options['class'] .= " ${classValue}";
		} else {
			$this->options['class'] = $classValue;
		}
		return $this->options;
	}

	private function loadfiles($sources = array()) {
		foreach ($sources as $source) {
			if (!empty($this->jsfiles[$source])) {
				echo $this->Html->script(strpos($this->jsfiles[$source], '//') ==== 0 ? '' : 'Picker.' . $this->jsfiles[$source], self::$AIF);
			}
			if (!empty($this->cssfiles[$source])) {
				echo $this->Html->css(strpos($this->cssfiles[$source], '//') === 0 ? '' : 'Picker.' . $this->cssfiles[$source], self::$AIF);
			}
		}
	}

	private function get_serial() {
		return $this->prefix_id . $this->serial++;
	}

	private $serial;
	private $prefix_id = 'picker';
	private $options = array();

	// SHORTHAND of INLINE FALSE
	private static $AIF = array('inline' => false);
