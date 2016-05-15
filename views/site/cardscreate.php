<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;

if(!yii::$app->request->post()) { ?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($card, 'series')->label('Серия') ?>
    <?= $form->field($card, 'number')->label('Номер') ?>
    <?= $form->field($card, 'expiration_date')->dropDownList(['1' => '1 месяц','2' => '6 месяцев','3' => '12 месяцев',])
                                            ->label('Срок действия'); ?>
    <?=$form->field($card, 'status')->checkbox(['label' => 'Активна']);?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end();
}
?>
