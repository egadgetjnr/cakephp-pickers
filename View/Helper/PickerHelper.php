<?php
App::uses('FormHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');

/**
 * Picker Helper
 *
 * Generate data pickers with HTML FORM INPUT + javascript.
 *
 *
 * ## How to use
 *
 * Load plugin using `CakePlugin::load()` method in <code>app/Config/bootstrap.php</code>
 *    ~~~CakePlugin::load('Picker');
 *    ~~~
 * or
 *
 *    ~~~CakePlugin::loadAll();
 *    ~~~
 *
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
}
