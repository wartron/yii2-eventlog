<?php

use insolita\wgadminlte\Timeline;
use kartik\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\search\Team $searchModel
*/

$this->title = 'Timeline';
$this->params['breadcrumbs'][] = ['label' => 'Eventlog', 'url' => ['/eventlog']];
$this->params['breadcrumbs'][] = $this->title;


// echo '<pre>';
// print_r($timeline);
// echo '</pre>';
// return;

//Next we can show its in our widget

echo Timeline::widget([
    'defaultDateBg' => Timeline::TYPE_RED,
    'items'     => $timeline,
    'dateFunc'  => function ($data) { return date('F j, Y', $data); }
]);
