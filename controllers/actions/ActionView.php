<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;
use yii\data\ActiveDataProvider;

trait ActionView{
    public function actionView(){
        $id=(integer)Yii::$app->request->get('id');
        if($id==0) return $this->redirect('/');
        else{
            $card=Cards::find()->where(['id'=>$id])->one();
            $purchases=new ActiveDataProvider([
                'query' => Cards::find()->where(['cards.id'=>$id])->joinWith('purchases')->orderBy('purchase_date'),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('view',['purchases'=>$purchases,'card'=>$card]);
        }
    }
}