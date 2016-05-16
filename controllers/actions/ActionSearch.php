<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;

trait ActionSearch
{
    public function actionSearch()
    {
        $series=Html::encode(trim(Yii::$app->request->post('series')));
        $number=Html::encode(trim(Yii::$app->request->post('number')));
        $create=Html::encode(Yii::$app->request->post('create'));
        $created=Html::encode(Yii::$app->request->post('created'));
        $expire=Html::encode(Yii::$app->request->post('expire'));
        $expired=Html::encode(Yii::$app->request->post('expired'));
        $statuss=Html::encode(trim(Yii::$app->request->post('statuss')));
        $where="1";

        switch ($statuss){
            case 'Неактивна':$status='0';break;
            case 'Активна':$status='1';break;
            case 'Просрочена':$status='2';break;
            default:$status='';
        }
        // формируем where из параметров поиска
        if($series!='') $where.=" and `series`='$series'";
        if($number!='') $where.=" and `number`=$number";
        if($create!='') $where.=" and `create_date`>'$create'";
        if($created!='') $where.=" and `create_date`<'$created'";
        if($expire!='') $where.=" and `expiration_date`>'$expire'";
        if($expired!='') $where.=" and `expiration_date`<'$expired'";
        if($status!='') $where.=" and `status`=$status";

        $cards=new ActiveDataProvider([
            'query' => Cards::find()->where($where),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        return $this->render('search',['cards'=>$cards]);
    }
}
