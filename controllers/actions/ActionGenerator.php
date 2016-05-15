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
            if(preg_match('/[a-z0-9]{3,}/',$series)) {
                $num = (integer)$data['num'];
                // проверяем есть ли эта серия, если есть, берем максимальный номер в ней
                if (Cards::find()->where(['series' => $series])->exists()) {
                    $ser = Cards::find()->where("`series`=$series")->orderBy(['number' => SORT_DESC])->all();
                    $max = (integer)$ser[0]->number;
                    $max++;
                } else {
                    $max = 0;
                }
                $period = (integer)$data['period'];
                // за раз не больше тысячи
                if ($num > 1000) {
                    echo 'Количество не может превышать 1000';
                    die();
                }
                $success = 1;
                $num = $num + $max;
                // проверка на максимально возможное значение
                if ($num > 999999) {
                    $free = 999999 - $max;
                    return $this->render('generator', ['success' => $success,'free'=>$free]);
                }
                for ($i = $max; $i < $num; $i++) {
                    $card = new Cards();
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
            }else $success=2;
            return $this->render('generator',['success'=>$success]);
        }
    }
}