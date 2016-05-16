<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;
use yii\data\ActiveDataProvider;

trait ActionCardsView{
    public function actionCardsview(){
        

        $cards=new ActiveDataProvider([
            'query' => Cards::find(),
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        return $this->render('cardsview',['cards'=>$cards]);
    }
}

