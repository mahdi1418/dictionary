<?php
require_once "loader.php";
$conn = db_conn();

$word = $_POST['word'];
$type = $_POST['type'];
$translateType = $_POST['translateType'];

if ($type == 'english' && $translateType == 'english') {
    $sql = "SELECT * FROM `words` WHERE `word` LIKE '$word%'";
    $output = db_select($sql);
    ?>
    <ul>
        <?php foreach ($output as $item): ?>
            <li>
                <p><?= $item[1] ?></p>
                <p><?= $item[1] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
} else if ($type == 'persian' && $translateType == 'persian') {
    $sql = "SELECT * FROM `words` WHERE `translate` LIKE '$word%'";
    $output = db_select($sql);
    ?>
    <ul>
        <?php foreach ($output as $item): ?>
            <li>
                <p><?= $item[2] ?></p>
                <p><?= $item[2] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
} else {
    if ($type == 'english') {
        $sql = "SELECT * FROM `words` WHERE `word` LIKE '$word%'";
    } else {
        $sql = "SELECT * FROM `words` WHERE `translate` LIKE '$word%'";
    }

    $output = db_select($sql);
    ?>
    <ul>
        <?php foreach ($output as $item): ?>
            <li>
                <p><?php echo $item[1]; ?></p>
                <p><?= $item[2] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}
?>