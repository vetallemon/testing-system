<?php
require_once('header.php');
?>
<?php ?>

    <div class="dynamic-form">

        <form method="post" action="create_question_action.php" >
            <div><h4>Запитання</h4>
                <input type="text" name="question_name" class="form-control input-size">
            </div>
            <div class="inputs">
                <h4>Варіанти відповідей:</h4>
                <div><input  checked type="radio" name="answers" value="0" class="radio-inline field_radio"><input type="text" name="dynamic[]" class="form-control input-block field" value=" "></div>
                <div><input type="radio" name="answers" value="1" class="radio-inline field_radio"><input type="text" name="dynamic[]" class="form-control input-block field" value=" "></div>
            </div>
            <a href="#" id="add">Добавити</a> | <a href="#" id="remove">Видалити</a>  | <a href="#" id="reset">Стерти</a>
            <button type="submit" class="btn btn-default">Додати питання</button>


        </form>
    </div>

    <button type="submit" class="btn btn-default"><a href="home.php">Завершити</a></button>
<?php
require_once('footer.php');
?>