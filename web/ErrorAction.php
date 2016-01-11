<?php
namespace wartron\yii2eventlog\web;

use Yii;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\ErrorAction as BaseErrorAction;
use wartron\yii2eventlog\models\EventlogItem;

class ErrorAction extends BaseErrorAction
{
    public function run()
    {
        $exception = Yii::$app->getErrorHandler()->exception;
        if($exception)
        {

            $data = [];

            if ($exception instanceof HttpException) {
                $data['http']   =   true;
                $data['code']   =   $exception->statusCode;
            } else {
                $data['http']   =   false;
                $data['code']   =   $exception->getCode();
            }

            $data['name']   =   $exception->getName();

            $data['message'] = $exception->getMessage();


            $request = Yii::$app->request;
            if($request){

                $data['request'] = [
                    'url'       =>  $request->getUrl(),
                    'cookies'   =>  $request->getCookies(),
                    'params'    =>  $request->getBodyParams(),
                ];
            }


            // new user Event
            $eli = new EventlogItem();
            $eli->name = "System Exception";
            $eli->type = EventlogItem::SYSTEM_EXCEPTION;
            $eli->data = json_encode($data);
            $eli->saveOrThrow();
        }
        return parent::run();

    }

}