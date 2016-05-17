<?php
/**
 * author     : forecho <caizhenghai@gmail.com>
 * createTime : 2016/5/16 19:49
 * description:
 */

namespace yiier\chartjs;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;


/**
 *
 * echo ChartJs::widget([
 *    'type' => 'line',
 *    'options' => [
 *        'height' => 400,
 *        'width' => 400
 *    ],
 *    'data' => [
 *        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
 *        'datasets' => [
 *            [
 *                'label'=> '# of Votes',
 *                'data' => [65, 59, 90, 81, 56, 55, 40]
 *            ],
 *            [
 *                'label'=> '# of Votes',
 *                'data' => [28, 48, 40, 19, 96, 27, 100]
 *            ]
 *        ]
 *    ]
 *]);
 *
 * Class ChartJs
 * @package frontend\widgets
 * @link http://www.chartjs.org/docs/
 */
class ChartJs extends Widget
{

    /**
     * @var array
     */
    public $options = [];

    /**
     * @var array
     */
    public $clientOptions = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var string
     */
    public $type = 'line';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if ($this->type === null) {
            throw new InvalidConfigException("The 'type' option is required");
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    public function run()
    {
        echo Html::tag('canvas', '', $this->options);
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $id = $this->options['id'];
        $type = $this->type;
        $view = $this->getView();
        $data = !empty($this->data) ? Json::encode($this->data) : '{}';
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '{}';
        ChartJsAsset::register($view);
        $js = ";var chartJS_{$id} = new Chart(document.getElementById('{$id}'), {type: '{$type}', data: {$data}, options: {$options}});";
        $view->registerJs($js);
    }
}