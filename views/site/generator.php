<?php
if(isset($success)) {
    if ($success == 1) {
        echo '<div>Карты успешно сгенерированы</div>';
    }else{
        echo '<div>При создании карт произошла ошибка</div>';
    }
}
?>

<div style="float: left;width: 50%; border: 1px solid gainsboro;padding: 15px;">
    <form method="post">
        <div style="float: left; width: 50%">
            <div style="height: 30px;">Серия<br/></div>
            <div style="height: 30px;">Количество карт (Максимально 1000 за раз)<br/></div>
            <div style="height: 30px;">Срок окончания активности<br/></div>
        </div>
        <div style="float: left; width: 50%;margin-bottom: 30px;">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->getRequest()->getCsrfToken()?>">
            <input type="text" name="series" maxlength="3" style="margin-bottom: 5px;width: 70%">
            <input type="number" name="num" min="1" max="1000" style="margin-bottom: 5px;width: 70%">
            <select name="period" style="width: 70%">
                <option value="1">1 месяц</option>
                <option value="6">6 месяцев</option>
                <option value="12">1 год</option>
            </select>
        </div>
        <input type="submit" id="submit">
    </form>
</div>

<script>
//    $(document).ready(function(){
//        alert(jQuery.fn.jquery);
//    });
    $(document).on('click','#submit',function(){
        $('#overlay').show();
    })
</script>