<?php
/**
 * @author Thimy Khotim <thimy.khotim@gmail.com>
 * @link https://github.com/khotim/yii2-highcharts/
 * @license MIT License
 * @version 1.0
 */
namespace khotim\highcharts;

/**
 * MapAsset is additional AssetBundle when using Highcharts::TYPE_HIGHMAPS.
 */
class MapAsset extends \yii\web\AssetBundle
{
    public $depends = ['khotim\highcharts\BaseAsset'];
    
    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        
        $this->sourcePath = __DIR__ . '/assets/modules';
        $this->js = YII_DEBUG ? ['map.src.js'] : ['map.js'];
    }
}
