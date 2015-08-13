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


$timeline_items=[];


for ($i = 0; $i < 5; $i++) {
    $time = (time() - mt_rand(3600, 3600 * 24 * 7 * 30 * 5));
    $objcnt = mt_rand(1, 6);
    $events = [];
    for ($j = 0; $j < $objcnt; $j++) {
        $obj = Yii::createObject(
            [
                'class' => \insolita\wgadminlte\ExampleTimelineItem::className(),
                'time' => $time - mt_rand(0, 3600 * 11),
                'header' =>'HEADER NUMBER '.$i.'_'.$j,
                'body' => 'Well, i`m informative body '.$i.'_'.$j,
                'type' => mt_rand(0, 1),
            ]
        );
        $events[] = $obj;
    }
    $timeline_items[$time] = $events;
}


//Next we can show its in our widget

echo Timeline::widget([
    'defaultDateBg' => function ($data) {
        return Timeline::TYPE_RED ;
        $d = date('j', $data);
        if ($d <= 10) {
            return Timeline::TYPE_FUS;
        } elseif ($d <= 20) {
            return Timeline::TYPE_MAR;
        } else {
            return Timeline::TYPE_PURPLE;
        }
    },
    'items'     => $timeline_items,
    'dateFunc'  => function ($data) { return date('d.m, Y', $data); }
]);
