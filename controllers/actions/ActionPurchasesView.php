<?php
namespace app\controllers\actions;

use app\models\Purchases;
use yii;
use yii\data\ActiveDataProvider;

trait ActionPurchasesView
{
    public function actionPurchasesview()
    {
//        $test=Purchases::find()->joinWith('card')->all();
//        echo '<pre>';
//        print_r($test);
//        echo '</pre>';die();
        $purchases=new ActiveDataProvider([
            'query' => Purchases::find()->joinWith('card'),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);
        return $this->render('purchasesview',['purchases'=>$purchases]);
    }
}