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

    {
        "require": {
            "rcsv/cakephp-pickers-collection": "*"
        }
    }

When use git submodule command

    git submodule add https://github.com/rcsv/cakephp-pickers-collection.git app/Plugin/Picker

### Setup

Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Picker');` 
or `CakePlugin::loadAll();` method. Next, you can include picker helper in `$helpers` array.

    class AppController extends Controller {
        public $helpers = array('Picker.Picker');
    }
    //
    // or
    //
    class AppController extends Controller {
        // use Picker plugin as a FormHelper
        public $helpers = array(
            'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
            'Form' => array('className' => 'Picker.Picker'));
        }
    }

## How to use
You can use Picker plugin as a normal FormHelper.

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

## Preference
### Add config into method
You can set more configuration via second parameter. The jQuery pickers can receive option values via `pickerOption` array.

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


### Change libraries path
You can change paths of javascript libraries. Default configuration is listed below.

    public $helpers = array(
        // or 'Picker.Picker' => array(
        'Form' => array('className' => 'Picker.Picker',
            
            'jsfiles' => array(
                'jquery' => 
                    '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js',
                'bootstrap' => 
                    '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js',
                'color' => 
                    'Picker.jquery.minicolors.min',
                'moment' => 
                    '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js',
                'date' => 
                    '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.js',  
                'location' => 
                    'Picker.locationpicker.jquery'),
        
            'cssfiles' => array(
                'bootstrap'
                    => '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css', 
                'color'
                    => 'Picker.jquery.minicolors', 
                'date' =>
                    '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/css/bootstrap-datetimepicker.min.css')));

**NOTE:** There are some path with prefixed 'Picker.', Those files store in plugin directly. CakePHP system is not good at loading files from plugin directly. So you should change some paths from 'Picker.*' to your `app/webroot/`.


## 日本語による説明でごあす。
Picker は CakePHP のプラグインとして動作する、jQuery 実装の様々なピッカーを呼び出しやすくするためのピッカー集です。
当該ピッカーで表示できるピッカーは下記になります。


`$this->Form->input()`
使えるピッカーは３種類で、それぞれ:

1. [x][Colorpicker]() jquery.minicolors.js です。
2. [ ][Date / Time Datetime picker]() bootstrap-datetimepicker.min.js です。
3. [ ][Timezonepicker]() 未実装です。

なお、Twitter Bootstrap ヘルパープラグインの BoostCake を必須としています。

## インスコ
composer でインスコ。

## 設置
`app/Config/bootstrap.php` で当該プラグインを読み込みます。

    CakePlugin::loadAll();

    // or

    CakePlugin::load('Picker');

次に、`app/Controller/AppController.php` または他のコントローラ、ヘルパー等で、
下記の様に使用宣言します。

    public $helpers = array(
      'Picker.Picker' => array(
        'jsfiles' => array(
          'jquery' => 'http://....../jquery.min.js',
          'bootstrap' => '......',
          'color' => '.....',
          'date' => '.....',
          'time' => '.....',
          'datetime' => '.....',
          'timezone' => '.....'),
        'cssfiles' => array(
          'bootstrap' => 'bootstrap.min',
          'color' => 'jquery.minicolors',
          'date' => 'bootstrap-datetimepicker.min',
          'time' => 'bootstrap-datetimepicker.min',
          'datetime' => 'bootstrap-datetimepicker.min'
          )));

## 使い方
`app/View/MODEL/hoge.ctp` にて、下記の用に呼び出し、`FormHelper` と同じ様に使用します。

    echo $this->Form->create('PickerCollection');
    echo $this->Form->input('title');
    echo $this->Picker->color('bgcolor', array('class' => 'hoge'));
    echo $this->Picker->date('start', array('placeholder' => '2014-08-31'));
    echo $this->Picker->time('time', array('placeholder' => '18:30:00'));
    echo $this->Picker->datetime('modified', array('placeholder' => '2014-06-20 20:00:00'));
    echo $this->Picker->timezone('place', array('place' => 'Asia/Tokyo'));
