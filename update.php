<?php
require_once('session_admin.php');
require_once('header.php');
$questions = $test->get_test_data($_GET['id']);
$_SESSION['test_id']= $_GET['id'];
$test_name = $test->getTestName($_GET['id']);
echo "<h3>".$test_name['test_name']."</h3>";
?>




        <div class="owl-carousel owl-theme">
            <?php
            foreach ($questions  as $question =>  $movie):
                ?>
            <form action="update_action.php" method="post">
                <div class="item">
                    <?php
                    foreach ($movie as $key => $item):
                        ?>
                        <?php if($key== 0):?>
                        <h3>Запитання: </h3>
                        <input class="form-control input-block" type="text" name="<?=$question?>" value="<?= $item ?>">
                        <h5>Відповіді: </h5>
                    <?php endif;?>

                        <?php if(!$key== 0):?>
                        <p>
                        <?php if(!$test->getCorrectAnswer($key)==""):?>
                            <input type="radio" name="answer" value="<?=$key?>" checked >

                        <?php endif?>
                            <?php if($test->getCorrectAnswer($key)==""):?>
                                <input type="radio" name="answer" value="<?=$key?>">
                            <?php endif?>
                        <input class="form-control input-block" type="text" name="<?=$key?>" value="<?= $item ?>">
                        </p>


                        <?php endif?>

                        <?php
                    endforeach;
                    ?>
                </div>
                <input type="submit" class="btn btn-success" value="Зберегти">
            </form>

                <?php
            endforeach;
            ?>
        </div>





<?php
require_once('footer.php');
?>