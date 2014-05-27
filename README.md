# Picker Collection
cakephp-picker-collection support you generate many types of picker in your
web application.

## 日本語による説明でごあす。
Picker は CakePHP のプラグインとして動作するピッカーコレクションです。
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
