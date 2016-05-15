<?php
namespace app\controllers\actions;

use yii;
use app\models\Cards;

trait ActionCardsCreate{
    public function actionCardscreate(){
        if(Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            switch ($post['Cards']['expiration_date']){
                case 1: $period=1;break;
                case 2: $period=6;break;
                case 3: $period=12;break;
                default: $period=0;
            }
            $success=0;
            $series=$post['Cards']['series'];
            $number=$post['Cards']['number'];
            if(Cards::find()->where(['series' => $series] and ['number'=>$number])->exists()){
                $success=2;
                $card=new Cards();
                return $this->render('cardscreate', ['card' => $card, 'success' => $success]);
            }
            if($post['Cards']['status']==1) {
                $status=1;
            }else $status=0;
            $card = new Cards();
            $card->series = $series;
            $card->number = $number;
            $card->create_date = date("Y-m-d H:i:s");
            $card->expiration_date = date("Y-m-d H:i:s", strtotime("+$period month"));
            $card->amount = 0;
            $card->status = $status;
            if ($card->save()) {
                $success = 1;
            }
            return $this->render('cardscreate', ['card' => $card, 'success' => $success]);
        }else{
            $card=new Cards();
            return $this->render('cardscreate',['card'=>$card]);
        }
    }
}