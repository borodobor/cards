<?php
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $cards,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'series',
        'number',
        'create_date',
        'expiration_date',
        'amount',
        [
            'attribute'=>'status',
            'label'=>'Статус',
            'content'=>function($data){
                if($data->status==0) {
                    return ('Неактивна');
                }elseif ($data->status==1){
                    return ('Активна');
                }else return ('Просрочена');
            }
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
