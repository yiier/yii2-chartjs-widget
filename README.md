ChartJs Widget
==============
[ChartJs 2](http://www.chartjs.org/docs/) for Yii2 widget

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yiier/yii2-chartjs-widget "*"
```

or add

```
"yiier/yii2-chartjs-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 200,
        'width' => 600
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
         'datasets' => [
             [
                 'label'=> '# of Votes',
                 'data' => [65, 59, 90, 81, 56, 55, 40]
             ],
             [
                 'label'=> '# of Votes',
                 'data' => [28, 48, 40, 19, 96, 27, 100]
             ]
         ]
    ]
]);?>
```