<?php
if(isset($success)) {
    if ($success == 1) {
        echo '<div style="color:green;">Покупка прошла успешно</div>';
    } elseif ($success == 0) {
        echo '<div style="color:red;">Во время покупки произошла ошибка</div>';
    }elseif ($success==2){
        echo '<div style="color:red;">Карты с указанными серией и номером не существует</div>';
    }elseif ($success==3){
        echo '<div style="color:red;">Указанная карта неактивна</div>';
    }elseif ($success==4){
        echo '<div style="color:red;">Указанная карта просрочена</div>';
    }
}
?>
<div>
    Сделать покупку:<br/>
    <form action="/site/purchase" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
        <div>
Данные карты для оплаты покупки<br/>
<label class="control-label">
Серия: <input type="text" name="series" maxlength="3" class="form-control" style="width: 100px"/>
            </label>
            <label class="control-label">
Номер: <input type="number" name="number"  min="1" max="999999" class="form-control"  style="width: 200px"/>
            </label><br/>
        </div>
        <label class="control-label">
Стоимость покупки <input type="number" name="price"  min="1" class="form-control"/>
        </label><br/>
        <input class="btn btn-primary" type="submit" value="Искать" style="">
    </form>
</div>