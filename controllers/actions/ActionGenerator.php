<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;
use yii\helpers\Html;

trait ActionGenerator
{
    public function actionGenerator()
    {
        set_time_limit(300);
        $data=Yii::$app->request->post();
        if($data==[]){
            return $this->render('generator',['data'=>$data]);
        }else{
            $series=Html::encode($data['series']);
            $num=(integer)$data['num'];
            $period=(integer)$data['period'];
            if($num>999999){
                echo 'Количество не может превышать 999999';die();
            }
            $success=1;
            for($i=0;$i<$num;$i++){
                $card=new Cards();
                $card->series = $series;
                $card->number = $i;
                $card->create_date = date("Y-m-d H:i:s");
                $card->expiration_date = date("Y-m-d H:i:s", strtotime("+$period month"));
                $card->amount = 0;
                $card->status = 0;
                if (!$card->save()) {
                    $success = 0;
                }
            }
            return $this->render('generator',['success'=>$success]);
        }
    }
}