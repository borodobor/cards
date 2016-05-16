<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div style="width: 50%;float: left;">
        <div style="margin-bottom: 30px">
        <a href="generator.php">Генератор карт</a><br/>
        <a href="cardscreate.php">Создать одну карту</a><br/>
        <a href="cardsview.php">Просмотр всех карт, поиск по ним</a><br/>
    </div>
    <div>
        Просмотр информации по карте:
        <form action="/site/view" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
            <label class="control-label">
                Серия: <input type="text" name="series" maxlength="3" class="form-control" style="width: 100px"/>
            </label>
            <label class="control-label">
                Номер: <input type="number" name="number"  min="1" max="999999" class="form-control"  style="width: 200px"/>
            </label><br/>
            <input class="btn btn-primary" type="submit" value="Искать" style="">
        </form>
    </div>
</div>
<div style="width: 50%;float: right">
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
