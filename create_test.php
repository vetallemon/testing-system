<?php
require_once('session_admin.php');
require_once('header.php');
?>

    
        <form method="post" action="create_test_action.php" >
            <div class="inputs">
                <h3>Назва тесту:</h3>
                <div class="input-size"><input type="text" name="test_name" class="form-control"></div>
            </div>
            <button type="submit" class="btn btn-default">Далі</button>
        </form>

   
<?php
require_once('footer.php');
?>