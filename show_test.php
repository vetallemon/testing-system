<?php
    require_once('header.php');
    $questions = $test->get_test_data($_GET['id']);
    $_SESSION['test_id']= $_GET['id'];
    $test_name = $test->getTestName($_GET['id']);
    echo "<h3>".$test_name['test_name']."</h3>";
?>



    <form action="save_result.php" method="post">
        <div class="owl-carousel owl-theme">
        <?php
        foreach ($questions  as $question =>  $movie):
            ?>

<div class="item">
            <?php
            foreach ($movie as $key => $item):
                ?>
                <?php if($key== 0):?>

                <h4> <?= $item ?></h4>

            <?php endif;?>

                <?php if(!$key== 0):?>

                <p><input type="radio" name="<?=$question?>" value="<?=$key?>"> <?= $item ?></p>

            <?php endif;?>


                <?php
            endforeach;
            ?>
</div>


            <?php
        endforeach;
        ?>
        </div>
        <input type="submit" class="btn btn-success" value="Завершити тест">
    </form>




<?php
require_once('footer.php');
?>