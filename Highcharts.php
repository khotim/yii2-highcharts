<?php
/**
 * @author Thimy Khotim <thimy.khotim@gmail.com>
 * @link https://github.com/khotim/yii2-highcharts/
 * @license MIT License
 * @version 1.0
 */
namespace khotim\highcharts;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

/**
 * Highcharts widget renders specific chart based on
 * [Highcharts library](http://www.highcharts.com/) as shown in
 * [this page](http://www.highcharts.com/demo).
 */
class Highcharts extends \yii\base\Widget
{
    const TYPE_HIGHCHARTS = 1;
    const TYPE_HIGHSTOCK = 2;
    const TYPE_HIGHMAPS = 3;
    
    /**
     * @var integer the type of chart to be rendered using Highcharts library
     */
    public $chartType = self::TYPE_HIGHCHARTS;
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['tag' => 'div'];
    /**
     * @var array the options for the underlying Highcharts library.
     * Please refer to [this page](http://api.highcharts.com/)
     * for list of supported options.
     */
    public $clientOptions = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId() . '-highcharts';
        }
        
        $this->id = $this->options['id'];
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        BaseAsset::register($this->getView());
        
        if ($this->chartType == self::TYPE_HIGHMAPS) {
            MapAsset::register($this->getView());
        }
        
        $this->renderWidget();
    }
    
    /**
     * Renders widget container with available options.
     */
    protected function renderWidget()
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        
        echo Html::tag($tag, '', $options);
        
        // checks if options parameter is a json string
        if (is_string($this->clientOptions)) {
            $this->clientOptions = Json::decode($this->clientOptions);
        }
        
        $this->registerClientOptions();
    }
    
    /**
     * Registers Highcharts library based on its chart type.
     */
    protected function registerClientOptions()
    {
        if ($this->clientOptions !== false) {
            if ($this->chartType == self::TYPE_HIGHSTOCK) {
                $constructor = 'StockChart';
            } else {
                $constructor = 'Chart';
            }
            
            $defaultOptions = ['chart' => ['renderTo' => $this->id]];
            $this->clientOptions = ArrayHelper::merge($defaultOptions, $this->clientOptions);
            
            $options = Json::htmlEncode($this->clientOptions);
            $js = "new Highcharts.{$constructor}($options);";
            
            $key = __CLASS__ . '#' . $this->id;
            $this->getView()->registerJs($js, View::POS_READY, $key);
        }
    }
}
