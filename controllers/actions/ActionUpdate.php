<?php
namespace app\controllers\actions;

use app\models\Cards;
use yii;

/*
 * Тут были большие сомнения по поводу того, какие поля пользователь должен
 * иметь возможность менять, думал сделать только поле активна/не активна, но
 * в итоге решил сделать все кроме id
 * 
 * */

trait ActionUpdate
{
    public function actionUpdate()
    {
        $id=(integer)Yii::$app->request->get('id');
        if($id==0) return $this->redirect('/');
        else {
            $card = Cards::find()->where(['id' => $id])->one();
            $post=Yii::$app->request->post();
            if($post==[]) {
                return $this->render('update', ['card' => $card]);
            }else{
                // Если статус поставили как просроченный, то меняем просто на неактивный
                if($post['Cards']['status']==2) {
                    $post['Cards']['status']=0;
                }
                $success=0;
                $card->load($post);
                // проверка на просроченность карты
                if($card->expiration_date>date("Y-m-d H:i:s")){
                    $card->status=2;
                }
                if($card->save()){
                    $success=1;
                }
            }
            return $this->render('update',['card'=>$card,'success'=>$success]);
        }
    }
}