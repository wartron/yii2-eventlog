<?php

use kartik\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\search\Team $searchModel
*/

$this->title = 'Event Log';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="searchall-index">


    <div class="panel panel-default">
        <div class="panel-heading">Event Log</div>
            <div class="table-responsive">
            <?php
                echo GridView::widget([
                    'layout'        =>  '{items}{summary}{pager}',
                    'dataProvider'  =>  $dataProvider,
                    'filterModel'   =>  $searchModel,
                    // 'pager'        => [
                    //     'class'          => yii\widgets\LinkPager::className(),
                    //     'firstPageLabel' => Yii::t('app', 'First'),
                    //     'lastPageLabel'  => Yii::t('app', 'Last')
                    // ],
                    'columns' => [
                        'id',
                        'name',
                        'type',
                        'user_id',
                        [
                            'attribute' =>  'created_at',
                            'format'    =>  'raw',
                            'value'     =>  function($m) {
                                if(!$m['created_at'])
                                    return '<span class="not-set">(not set)</span>';
                                $relativeTime = \Yii::$app->formatter->asRelativeTime($m['created_at']);
                                $formatedTime = \Yii::$app->formatter->asDatetime($m['created_at']);
                                return '<span title="'.$formatedTime.'">'.$relativeTime.'</span>';
                            }
                        ],
                        [
                            'attribute' =>  'read_at',
                            'format'    =>  'raw',
                            'value'     =>  function($m) {
                                if(!$m['read_at'])
                                    return '<span class="not-set">(not set)</span>';
                                $relativeTime = \Yii::$app->formatter->asRelativeTime($m['read_at']);
                                $formatedTime = \Yii::$app->formatter->asDatetime($m['read_at']);
                                return '<span title="'.$formatedTime.'">'.$relativeTime.'</span>';
                            }
                        ],
                        'data',
                    ],
                ]);
            ?>
        </div>
    </div>

</div>






