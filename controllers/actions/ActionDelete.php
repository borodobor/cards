<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;


trait ActionDelete
{
    public function actionDelete()
    {
        $id=(integer)Yii::$app->request->get('id');
        if($id==0) return $this->redirect('/');
        else {
            $card = Cards::find()->where(['id' => $id])->one();
            $card->delete();
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}