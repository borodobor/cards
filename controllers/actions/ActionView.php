<?php
namespace app\controllers\actions;

use app\models\Cards;
use app\models\Purchases;
use yii;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Html;

trait ActionView{
    public function actionView(){
        $id=Yii::$app->request->get('id');
        if(!isset($id)) {
            $post=Yii::$app->request->post();
            if(!isset($post['series'])||!isset($post['number'])){
                $success=0;
            }else{
                $series=Html::encode($post['series']);
                $number=(integer)$post['number'];
                if(Cards::find()->where("`series`='$series' and `number`=$number")->exists()){
                    $result=Cards::find()->where("`series`='$series' and `number`=$number")->one();
                    $card_id=$result->id;
                    return $this->redirect("/site/view?id=$card_id");
                }
                $success=2;
            }
            return $this->render('view',['success'=>$success]);
        }
        else{
            $id=(integer)$id;
            $card=Cards::find()->where(['id'=>$id])->one();
            $purchases=new ActiveDataProvider([
                'query' => Purchases::find('*')->where(['card_id'=>$id]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('view',['purchases'=>$purchases,'card'=>$card,'id'=>$id]);
        }
    }
}