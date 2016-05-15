<?php
use yii\grid\GridView;
use \dosamigos\datetimepicker\DateTimePicker;

?>
<div style="border: 1px solid #cccccc;padding: 15px;margin-bottom: 30px">
    Поиск:<br/>
    <form action="/site/search" method="post">
        <label class="control-label">
            Серия: <input type="text" name="series" class="form-control"/>
        </label>
        <label class="control-label">
            Номер: <input type="text" name="number" class="form-control"/>
        </label><br/>
        <label class="control-label" style="width: 35%; ">
            Выпущена
            <?= DateTimePicker::widget([
                'language' => 'ru',
                'size' => 'ms',
                'name' => 'name',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:00 P',
                    'todayBtn' => true
                ]
            ]);?>
        </label>
        <label class="control-label" style="width: 35%;">
            по
            <?= DateTimePicker::widget([
                'language' => 'ru',
                'size' => 'ms',
                'name' => 'name',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:00 P',
                    'todayBtn' => true
                ]
            ]);?>
        </label>
        <label class="control-label" style="width: 35%;">
            Действительна
            <?= DateTimePicker::widget([
                'language' => 'ru',
                'size' => 'ms',
                'name' => 'name',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:00 P',
                    'todayBtn' => true
                ]
            ]);?>
        </label>
        <label class="control-label" style="width: 35%;">
            по
            <?= DateTimePicker::widget([
                'language' => 'ru',
                'size' => 'ms',
                'name' => 'name',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:00 P',
                    'todayBtn' => true
                ]
            ]);?>
        </label><br/>
        <label class="control-label">Статус
            <select class="form-control">
                <option></option>
                <option>Неактивна</option>
                <option>Активна</option>
                <option>Просрочена</option>
            </select>
        </label>
        <input class="btn btn-primary" type="submit" value="Искать" style="float: right;margin-right: 50px">
    </form>
</div>



<?php
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
