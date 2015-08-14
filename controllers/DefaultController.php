<?php
namespace wartron\yii2eventlog\controllers;

use Yii;
use yii\web\Controller;
use wartron\yii2eventlog\models\EventSearch;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $searchModel  = new EventSearch;
        $dataProvider = $searchModel->search($_GET);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }
    public function actionTimeline()
    {
        $searchModel  = new EventSearch;
        $dataProvider = $searchModel->search($_GET);


        return $this->render('timeline', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'timeline'  =>  $searchModel->buildTimeline($dataProvider->getModels()),
        ]);

    }


}
