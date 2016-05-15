<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

if(isset($success)){
    if($success==1){
        echo '<div style="color:green;">Изменения успешно сохранены</div>';
    }else{
        echo '<div style="color:red;">При изменении произошла ошибка</div>';
    }
}
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($card, 'id')->hiddenInput()->label(false) ?>
    <?= $form->field($card, 'series')->label('Серия') ?>
    <?= $form->field($card, 'number')->label('Номер') ?>
    <?= $form->field($card, 'create_date')->label('Дата выпуска') ?>
    <?= $form->field($card, 'expiration_date')->label('Дата окончания активности'); ?>
    <?= $form->field($card, 'amount')->label('Сумма покупок по карте'); ?>
<?php
echo $form->field($card, 'status')
    ->dropDownList([
        0 => 'Неактивна',
        1 => 'Активна',
        2 => 'Просрочена',
    ])->label('Статус карты');
?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end();