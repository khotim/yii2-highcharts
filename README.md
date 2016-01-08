# yii2-highcharts
Yii2 wrapper for [Highcharts library](http://www.highcharts.com/).
It supports rendering Highcharts, Highstock, and Highmaps.

[![Latest Stable Version](https://poser.pugx.org/khotim/yii2-highcharts/v/stable)](https://packagist.org/packages/khotim/yii2-highcharts)
[![License](https://poser.pugx.org/khotim/yii2-highcharts/license)](https://packagist.org/packages/khotim/yii2-highcharts)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist khotim/yii2-highcharts "*"
```

or add

```
"khotim/yii2-highcharts": "*"
```

to the require section of your `composer.json` file.


Usage
-----
Insert the following code into a view file (using [this sample](http://www.highcharts.com/docs/getting-started/your-first-chart)).
```php
<?= khotim\highcharts\Highcharts::widget([
    'chartType' => Highcharts::TYPE_HIGHCHARTS,
    'options' => [
        'id' => 'myChart'
    ],
   'clientOptions' => [
        'chart' => [
            'type' => 'bar'
        ],
        'title' => [
            'text' => 'Fruit Consumption'
        ],
        'xAxis' => [
            'categories' => ['Apples', 'Bananas', 'Oranges']
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Fruit eaten'
            ]
        ],
        'series' => [
            [
                'name' => 'Jane',
                'data' => [1, 0, 4]
            ],
            [
                'name' =>'Production',
                'data' => [5, 7, 3]
            ]
        ]
    ]
]) ?>
```
------------
###Constants
Constant        &nbsp;| Value &nbsp;| Description
:---------------------|:-----------:|:-----------
TYPE_HIGHCHARTS &nbsp;|   1   &nbsp;| Chart type Highcharts.
TYPE_HIGHSTOCK  &nbsp;|   2   &nbsp;| Chart type Highstock.
TYPE_HIGHMAPS   &nbsp;|   3   &nbsp;| Chart type Highmaps.

###Public Properties
Property       &nbsp;|  Type   &nbsp;| Description
:--------------------|:-------------:|:-----------
$chartType     &nbsp;| integer &nbsp;| Specifies type of chart to be rendered. Defaults to `Highcharts::TYPE_HIGHCHARTS`.
$options       &nbsp;|  array  &nbsp;| The HTML attributes for the widget container tag. The "tag" element specifies the tag name of the container element and defaults to "div".
$clientOptions &nbsp;|  array  &nbsp;| The options for the underlying Highcharts library. Refers to [this page](http://api.highcharts.com/) for more information.
