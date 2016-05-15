<?php
use yii\grid\GridView;
$status='<span style="color:red;">неактивна</span>';
if($card->status==1) $status='<span style="color:green;">активна</span>';
else if($card->status==2) $status='<span style="color:darkblue;">просрочена</span>';

echo '<div style="font-size: 18px;">Карта серия <strong>'.$card->series.'</strong> номер <strong>'.$card->number.
    '</strong> действительна до '.$card->expiration_date.', <strong>'. $status.'</strong></div>';
if($card->amount==0){
    echo '<div style="text-align: center; margin: 50px;font-size: 24px;">Покупок по этой карте совершено не было</div>';
}else {
    echo GridView::widget([
        'dataProvider' => $purchases,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'purchases.purchase_date',
            'purchases.price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
}