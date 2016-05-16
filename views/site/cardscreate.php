<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
if(isset($success)) {
    if ($success == 1) {
        echo '<div style="color:green;">Карта успешно создана</div>';
    }elseif ($success==2){
        echo '<div style="color:red;">Ошибка. Карта уже существует</div>';
    }elseif($success==3) {
        echo '<div style="color:red;">Недопустимые символы в серии карт или менее 3 символов</div>';
    }else{
        echo '<div style="color:red;">Неизвестная ошибка</div>';
    }
}
?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($card, 'series')->label('Серия (только строчные латинские буквы и цифры)') ?>
    <?= $form->field($card, 'number')->label('Номер') ?>
    <?= $form->field($card, 'expiration_date')->dropDownList(['1' => '1 месяц','2' => '6 месяцев','3' => '12 месяцев',])
                                            ->label('Срок действия'); ?>
    <?=$form->field($card, 'status')->checkbox(['label' => 'Активна']);?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end();
?>
