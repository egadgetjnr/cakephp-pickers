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
    'type' => 'text',
    'class' => 'form-control',
    'beforeInput' => '<span class="input-group-addon"><i class="add-on glyphicon glyphicon-calendar"></i></span>',
    'div' => array(
      'class' => 'form-group'),
    'wrapInput' => array(
      'class' => 'input-group date',
      'data-date-format' => 'yyyy-mm-dd',
      'data-date' => ''));


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
    'moment'    => 'Picker.moment.min',
    'date'      => 'Picker.bootstrap-datetimepicker.min',
    'time'      => 'Picker.bootstrap-datetimepicker.min',
    'datetime'  => 'Picker.bootstrap-datetimepicker.min',
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
    'time'      => 'Picker.bootstrap-datetimepicker.min',
    'datetime'  => 'Picker.bootstrap-datetimepicker.min',
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
  public __constructor($View, $settings) {
    if (!empty($settings['jsfiles']))  $this->jsfiles += $settings['jsfiles'];
    if (!empty($settings['cssfiles'])) $this->cssfiles+= $settings['cssfiles'];
    unset($settings['jsfiles'], $settings['cssfiles']);
    parent::__construct($View, $settings);
  }


  /**
   * Generate input tag and enabled Colorpicker. See
   * http://labs.abeautifulsite.net/jquery-minicolors/
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
      JSON_FORCE_OBJECT);
    unset($options['pickerOption']);
    $options['class'] =
      isset($options['class']) && strstr($options['class'], 'minicolors form-control') === false
        ? "${options['class']} minicolors form-control"
        : "minicolors form-control";
    $this->loadFiles(array('jquery','bootstrap','color'));
  }

  // Private methods
  // --------------------------------------------------------------------------

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
      if (!empty($this->cssfiles[$source])) {
        echo $this->Html->css($this->cssfiles[$source], self::$AIF);
      }
    }

  }

  private $AIF = array('inline' => false);
}
