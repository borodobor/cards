<?php
use yii\grid\GridView;
echo GridView::widget([
    'dataProvider' => $purchases,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'purchase_date',
        'price',
        [
            'attribute'=>'card.series',
            'label'=>'Серия карты',
            'options'=>['style'=>'width:30px'],
        ],
        [
            'attribute'=>'card.number',
            'label'=>'Номер карты',
            'options'=>['style'=>'width:30px'],
            'content'=>function($data){
                return '<a href="/site/view?id='.$data->card_id.'">'.$data->card->number.'</a>';
            }
        ],
    ],
]);