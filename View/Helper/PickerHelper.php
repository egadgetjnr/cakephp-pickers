<?php
App::uses('FormHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');

/**
 * Picker Helper
 *
 * Generate data pickers with HTML FORM INPUT + javascript.
 *
 * ## How to use
 * Load plugin at `app/Config/bootstrap.php`.
 *
 *     CakePlugin::loadAll();
 *     // or
 *     CakePlugin::load('Picker');
 *
 * Then, declare to use it in a AppController.php.
 *
 *     public $helpers = array(
 *         'Picker.Picker',
 *         'jsfiles' => array(....),
 *         'cssfiles' => array(...)));
 *
 * @package  Picker.View.Helper
 * @author   rcsvpg@gmail.com
 * @link     http://github.com/rcsv/pickers-collection
 */
class PickerHelper extends BoostCakeFormHelper {

  // Helpers what I am going to use, listed below.
  // Pickers requires BoostCake plugin.
  public $helpers = array(
    'Picker.PickerHtml',
    'Form' => array('className' => 'BoostCake.BoostCakeForm'),
    'Html' => array('className' => 'BoostCake.BoostCakeHtml'));



  // Settings / Configurations
  // --------------------------------------------------------------------------

  /**
   * default option values for enable jquery.minicolors.js via BoostCake.
   *
   * @var array
   */
  private $colorpickerDefault = array(
    'pickerOption' => array(),
    'type' => 'text',
    'class' => 'form-control',
    'div' => array(
      'class' => 'form-group'));


  /**
   * default option values for enable bootstrap-datetimepicker.js via BoostCake.
   *
   * @var array
   */
  private $datepickerDefault = array(
    'pickerOption' => array(),
    'type' => 'text',
    'class' => 'form-control',
    'beforeInput' => '<span class="input-group-addon"><i class="add-on glyphicon glyphicon-calendar"></i></span>',
    'div' => array(
      'class' => 'form-group'),
    'wrapInput' => array(
      'class' => 'input-group date',
      'data-date' => ''));


  /**
   * default option values for enable locationpicker.jquery.js via BoostCake.
   *
   * @var array
   */
  private $locationpickerDefault = array(
    'pickerOption' => array(),
    'type' => 'text',
    'class' => 'form-control',
    'beforeInput' => '<span class="input-group-addon"><i class="add-on glyphicon glyphicon-map-marker"></i></span>',
    'div' => array(
      'class' => 'form-group'),
    'wrapInput' => array(
      'class' => 'input-group'));


  /**
   * URL or PATH use for script tag. Default values are append string 'Picker.'
   * as a prefix. These strings will call via `HtmlHelper::script();`.
   *
   * @var array
   */
  private $jsfiles = array(
    'jquery'    => 'Picker.jquery-2.1.0.min',
    'bootstrap' => 'Picker.bootstrap.min',
    'color'     => 'Picker.jquery.minicolors',
    'moment'    => 'Picker.moment.min', // moment.js required >= 2.5.1 by datetimepicker
    'date'      => 'Picker.bootstrap-datetimepicker.min',
    'date.ja'   => 'Picker.locales/bootstrap-datetimepicker.ja',
    'date.ar-ma'=> 'Picker.locales/bootstrap-datetimepicker.ar-ma',
    'gmaps'     => 'http://maps.google.com/maps/api/js?sensor=false&libraries=places',
    'location'  => 'Picker.locationpicker.jquery',
    'timezone'  => '//');


  /**
   * URL or PATH use for link tag. Default values are append string 'Picker.' as
   * a prefix. These strings are going to be called `HtmlHelper::css();`
   *
   * @var array
   */
  private $cssfiles = array(
    'bootstrap' => 'Picker.bootstrap.min',
    'color'     => 'Picker.minicolors',
    'date'      => 'Picker.bootstrap-datetimepicker.min',
    'timezone'  => '//');


  // Public methods
  // --------------------------------------------------------------------------

  /**
   * Constructor stores new paths of .js and .css
   *
   *     public $helpers = array(
   *         'Picker.Picker' => array('jsfiles' => array('')));
   *
   * @param object $View an instance of CakeView? Object.
   * @param array $settings Parameters set at AppController::$helpers array.
   */
  public __constructor($View, $settings = array()) {
    $this->serial = 0;
    if (!empty($settings['jsfiles']))  $this->jsfiles += $settings['jsfiles'];
    if (!empty($settings['cssfiles'])) $this->cssfiles+= $settings['cssfiles'];
    unset($settings['jsfiles'], $settings['cssfiles']);
    parent::__construct($View, $settings);
  }


  /**
   * Generate input tag and enabled Colorpicker. See
   * http://labs.abeautifulsite.net/jquery-minicolors/.
   *
   *
   *
   * @param string $fieldName a fieldname.
   * @param array $options options array.
   */
  public function color($fieldName, $options = array()) {
    $options = array_merge($this->colorpickerDefault, $options);
    $pickerOption = json_encode(
      isset($options['pickerOption'])
        ? $options['pickerOption']
        : array(),
      JSON_FORCE_OBJECT|JSON_PRETTY_PRINT);
    unset($options['pickerOption']);
    $options['class'] =
      isset($options['class']) && strstr($options['class'], 'minicolors form-control') === false
        ? "${options['class']} minicolors form-control"
        : "minicolors form-control";

    $this->loadFiles(array('jquery','bootstrap','color'));
    echo $this->Html->scriptBlock(
      "\$('input.minicolors').minicolors(${pickerOption});",
      self::$AIF);
    return $this->Form->input($fieldName, $options);
  }


  /**
   * generate a location / address picker via location.jquery.js.
   *
   * @param string $fieldName
   * @param array $options
   */
  public function location($fieldName, $options = array()) {
    $options = array_merge($this->locationpickerDefault, $options);
    $options['pickerOption'] = array_merge(
      !empty($options['pickerOption']) ? $options['pickerOption'] : array(),
      array(
        'style' => 'width:500px;height:380px;',
        'inputBinding' => array(
          'locationNameInput' => "\$('#"
          . $this->domId($fieldName) . "')'")));

    if (strstr($options['class'], 'form-control') === false) {
      $options['class'] = "${options['class']} form-control";
    }

    $divId = $this->getSerial();
    $maparea = "<div id=\"${divId}\" style=\""
      . $options['pickerOption']['style']
      . '"></div>';
    unset($options['pickerOption']['style']);

    $this->loadFiles(array('jquery', 'bootstrap', 'gmaps', 'location'));
    echo $this->Html->scriptBlock("\$('#${divId}').locationpicker("
      . preg_replace('/"*"/', '$1', json_encode($options['pickerOption'], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT))
      , self::$AIF);
    return $maparea . $this->Form->input($fieldName, $options);
  }


  /**
   * generate date picker form via bootstrap-datetimepicker.js
   *
   * @param string $fieldName
   * @param array $options
   */
  public function date($fieldName, $options = array()) {
    $options['pickerOption'] = array_merge(
      !empty($options['pickerOption']) ? $options['pickerOption'] : array(),
      array(
        'pickDate' => true,
        'pickTime' => false));
    return $this->generateDateTimePicker($fieldName, $options);
  }


  /**
   * generate time picker form via bootstrap-datetimepicker.js
   *
   * @param string $fieldName
   * @param array $options
   */
  public function time($fieldName, $options = array()) {
    $option = array_merge(array(
      'beforeInput' => '<span class="input-group-addon"><i class="add-on glyphicon glyphicon-time"></i></span>'),
      $options);
    $options['pickerOption'] = array_merge(
      !empty($option['pickerOption']) ? $option['pickerOption'] : array(),
      array(
        'pickDate' => false,
        'pickTime' => true));
    return $this->generateDateTimePicker($fieldName, $option);
  }


  /**
   * dateAndTime method generates time picker form via
   * bootstrap-datetimepicker.js. It name was `dateTime` originally, but same
   * method already existed in FormHelper. So, it had to change the name.
   *
   * @param string $fieldName
   * @param array $options
   * @return HTML form input tag with javascript
   */
  public function dateAndTime($fieldName, $options) {
    $options['pickerOption'] = array_merge(
      array('sideBySide' => true),
      !empty($options['pickerOption']) ? $options['pickerOption'] : array(),
      array(
        'pickDate' => true,
        'pickTime' => true));
    return $this->generateDateTimePicker($fieldName, $options);
  }

  // TimeZone Picker DOES NOT IMPLEMENTS YET
  public function timezone($fieldName, $options = array()) {
    throw new NotImplementedException('PickerHelper::timezone picker does not implement yet.');
  }

  // Private methods
  // --------------------------------------------------------------------------

  /**
   * bootstrap-datetimepicker.js DATE | TIME | DATETIME
   *
   * @param string $fieldName a field name
   * @param array $options option list for BoostCake and bootstrap-datetimepicker
   */
  private function generateDateTimePicker($fieldName, $options = array()) {
    $options = array_merge($this->datepickerDefault, $options);

    if (strstr($options['class'], 'form-control') === false) {
      $options['class'] = "${options['class']} form-control";
    }

    $this->loadFiles(array('jquery', 'moment', 'bootstrap', 'date'));

    if (!empty($options['pickerOption']['language'])) {
      $this->loadFiles(array('date.' . $options['pickerOption']['language']));
    }

    $divId = $this->getSerial();
    $options['wrapInput']['id'] = $divId;
    echo $this->Html->scriptBlock(
      "\$(function () { \$('#${divId}').datetimepicker("
      . json_encode($options['pickerOption'], JSON_FORCE_OBJECT | JSON_PRETTY_PRINT)
      . ")});",
      self::$AIF);
    unset($options['pickerOption']);
    return $this->Form->input($fieldName, $options);
  }

  // For surpress duplicate call.
  // an array to store resource name already called by loadFiles() method.
  private $alreadyLoadedCSS = array();

  /**
   * loadfiles() -- load Cascading Stylesheet (.css) and Javascript (.js) files
   * as a LINK or SCRIPT tag.
   *
   * @param array $sources
   */
  private function loadFiles($sources = array()) {
    foreach ($sources as $source) {
      if (!empty($this->jsfiles[$source])) {
        echo $this->Html->script($this->jsfiles[$source], self::$AIF);
      }
      if (!in_array($source, $this->alreadyLoadedCSS) && !empty($this->cssfiles[$source])) {
        echo $this->Html->css($this->cssfiles[$source], self::$AIF);
        $this->alreadyLoadedCSS[] = $source;
      }
    }
  }


  private function getSerial() {
    return $this->prefix . ++$this->serial;
  }

  /**
   * sequential number for DOM ID
   */
  private $seiral = 0;


  /**
   * constants string for DOM ID prefix
   */
  private $prefix = 'picker';


  // SHORT HAND of INLINE => FALSE
  private $AIF = array('inline' => false);
}
