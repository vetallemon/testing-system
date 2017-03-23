<?php
    require_once('header.php');
?>

        <?php
        foreach ($test->getTests() as $item):
            ?>
            <a href="show_test.php?id=<?=$item['id']?>"><h3><?= $item["test_name"]?></h3></a>
            <?php if($userRow['user_name']=='admin'): ?>
            <a href ="update.php?id=<?=$item['id']?>">Редагувати</a>
            <a href ="delete.php?id=<?=$item['id']?>">Видалити</a>
            <?php endif ?>
            <?php
        endforeach;
        ?>
<?php
require_once('footer.php');
?>
