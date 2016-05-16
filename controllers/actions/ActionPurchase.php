<?php
namespace app\controllers\actions;

use app\models\Purchases;
use yii;
use app\models\Cards;
use yii\bootstrap\Html;

trait ActionPurchase
{
    public function actionPurchase()
    {
        $post=Yii::$app->request->post();
        if($post==[]) {
            $this->render('purchase', ['success'=>5]);
        }else{
            $price=(integer)$post['price'];
            $series=Html::encode($post['series']);
            $number=(integer)$post['number'];
            if(Cards::find()->where("`series`='$series' and `number`=$number")->exists()) {
                $result = Cards::find()->where("`series`='$series' and `number`=$number")->one();
                // Проверка на просроченность карты
                if($result->expiration_date>date("Y-m-d H:i:s")){
                    $result->status=2;
                    $result->save();
                }
                if($result->status==1) {
                    $card_id = $result->id;
                    $purchase = new Purchases();
                    $purchase->card_id = $card_id;
                    $purchase->price = $price;
                    $purchase->purchase_date = date("Y-m-d H:i:s");
                    if ($purchase->save()) {
                        $result->amount+=$price;
                        if($result->save()) {
                            $success = 1;
                        }
                    } else {
                        $success = 0;
                    }
                }elseif ($result->status==0){
                    $success=3;
                }elseif ($result->status==2){
                    $success=4;
                }
                return $this->render('purchase',['success'=>$success]);
            }else{
                $success=2;
                return $this->render('purchase',['success'=>$success]);
            }
        }
    }
}