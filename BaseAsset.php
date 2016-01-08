<?php
/**
 * @author Thimy Khotim <thimy.khotim@gmail.com>
 * @link https://github.com/khotim/yii2-highcharts/
 * @license MIT License
 * @version 1.0
 */
namespace khotim\highcharts;

/**
 * BaseAsset is AssetBundle for Highcharts, Highstock, and Highmaps widget.
 */
class BaseAsset extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
    
    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        
        $this->sourcePath = __DIR__ . '/assets';
        $this->js = YII_DEBUG ? ['highstock.src.js'] : ['highstock.js'];
    }
}
