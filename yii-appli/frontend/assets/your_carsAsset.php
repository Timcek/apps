<?php


namespace frontend\assets;
use yii\web\AssetBundle;

class your_carsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/your_cars.css"
    ];
    public $js = [
        "js/your_cars.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}