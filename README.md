# Pickers Collection
Picker is a plugin for CakePHP, a Helper implementation to enable form input with jquery-based pickers.
Available pickers listed below:

1. [x] color : [claviska/jquery-minicolors](https://github.com/claviska/jquery-miniColors)
2. [x] date / time / datetime : [Eonasdan/bootstrap-datetimepicker](https://eonasdan.github.com/bootstrap-datetimepicker/)
3. [x] location : [Logicify - jQuery Location Picker](http://logicify.github.io/jquery-locationpicker-plugin/)
4. [ ] address  : not implemented yet.
5. [ ] timezone : not implemented yet.

## Requirements

Picker plugin requires the BoostCake plugin.
- BoostCake CakePHP Plugin is requried.

Other requirement / constraints may follow other libraries requirement.
- PHP >= 5.3.0
- CakePHP >= 2.3.0
- moment.js >= 2.5.1

## Installation
When using `composer`, ensure `require` is present in `composer.json`. This will install the plugin into `Plugin/Picker`:

```json
{
    "require": {
        "rcsv/cakephp-pickers-collection": "*"
    }
}
```

When use git submodule command

```sh
git submodule add https://github.com/rcsv/cakephp-pickers-collection.git app/Plugin/Picker
```

### Setup

Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Picker');` 
or `CakePlugin::loadAll();` method. Next, you can include picker helper in `$helpers` array.

```php
class AppController extends Controller {
    public $helpers = array('Picker.PickerForm');
}

// or

class AppController extends Controller {
    // use Picker plugin as a FormHelper
    public $helpers = array(
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'Picker.PickerForm'));
    }
}
```

## How to use
You can use Picker plugin as a normal FormHelper.

```php
// You can start Form normally.
echo $this->Form->create('PickerCollection');
echo $this->Form->input('title');

// jquery Minicolors plugin
echo $this->Form->color('bgcolor');

// jquery Datetimepicker (date mode)
echo $this->Form->date('start');

// jquery Datetimepicker (time mode)
echo $this->Form->time('time');

// jquery Datetimepicker (both mode)
echo $this->Form->datetime('modified');

echo $this->Form->end('end');
```

## Preference
### Add config into method
You can set more configuration via second parameter. The jQuery pickers can receive option values via `pickerOption` array.

```php
echo $this->Form->color('bgcolor', array(
    'class' => 'exampleclass1 exampleclass2',
    'wrapInput' => false,
    'placeholder' => '#RRGGBB',
    // you can set minicolors.jquery plugin via 'pickerOption'.
    // To check available options of minicolors jquery, see 
    // http://labs.abeautifulsite.net/jquery-minicolors/
    'pickerOption' => array(
        'theme' => 'bootstrap',
        'control' => 'saturation')));
```

### Change libraries path
You can change paths of javascript and CSS libraries. Default configuration is
listed below, you can modify prefer URL.

```php
public $helpers = array(
    'Form' => array(
        'className' => 'Picker.Picker',

        // JAVASCRIPT DEFAULT VALUES
		// =========================
        'jsfiles' => array(

        	// jquery and bootstrap always use.
            'jquery' => 
                '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js',
            'bootstrap' => 
                '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js',

            // color uses when you called color() method
            'color' => 
                'Picker.jquery.minicolors.min',

            // moment uses when you called date(), time(), and datetime() methods.
            'moment' => 
                '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js',
            'moment.ja' =>
                '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/locales/moment.........',

            'date' => 
                '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.js',  

            'location' => 
                'Picker.locationpicker.jquery'),

    	// CSS DEFAULT PATHS
    	// =========================
        'cssfiles' => array(
            'bootstrap'
                => '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css', 
            'color'
                => 'Picker.jquery.minicolors', 
            'date' =>
                '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.css')));
```

**NOTE:** There are some path with prefixed 'Picker.', Those files store in plugin directly. CakePHP system is not good at loading files from plugin directly. So you should change some paths from 'Picker.*' to your `app/webroot/`.
