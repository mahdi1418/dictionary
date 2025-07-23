<?php
require_once "loader.php";
$conn = db_conn();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['word']) && isset($_POST['type'])) {
    $word = $_POST['word'];
    $type = $_POST['type'];
    $translateType = $_POST['translateType'];

    if ($type == 'english' && $translateType == 'english') {
        $sql = "SELECT * FROM `words` WHERE `word` LIKE '$word%'";
        $text = mysqli_query($conn, $sql);
        if (mysqli_num_rows($text) > 0) {
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
        } else { ?>
            <li>
                <p class="text-warning">No word found</p>
                <p class="text-warning">No word found</p>
            </li> <?php
                }
            } else if ($type == 'persian' && $translateType == 'persian') {
                $sql = "SELECT * FROM `words` WHERE `translate` LIKE '$word%'";
                $text = mysqli_query($conn, $sql);
                if (mysqli_num_rows($text) > 0) {
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
        <?php      } else { ?>
            <li>
                <p class="text-warning">کلمه ای پیدا نشد</p>
                <p class="text-warning">کلمه ای پیدا نشد</p>
            </li> <?php
                }
            } else {
                if ($type == 'english') {
                    $sql = "SELECT * FROM `words` WHERE `word` LIKE '$word%'";
                } else {
                    $sql = "SELECT * FROM `words` WHERE `translate` LIKE '$word%'";
                }
                $text = mysqli_query($conn, $sql);
                if (mysqli_num_rows($text) > 0) {
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
                } else { ?>
            <li>
                <p class="text-warning">No word found</p>
                <p class="text-warning">کلمه ای پیدا نشد</p>
            </li> <?php
                }
            }
        } else if (isset($_POST['emaillog']) && isset($_POST['passlog'])) {
            if (empty($_POST['emaillog']) || empty($_POST['passlog'])) {
                $error = 'please fill out all fields';
                echo json_encode($error);
            } else {
                $email = $_POST['emaillog'];
                $pass = $_POST['passlog'];
                $pass = md5($pass);
                $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'";
                $result = db_select($sql);
                if ($result) {
                    $msql = mysqli_query(db_conn(), $sql);
                    $user = mysqli_fetch_assoc($msql);
                    $_SESSION['user'] = $user['user_id'];
                    $success = "you are logged in, going to panel";
                    echo json_encode($success);
                } else {
                    $error = "email or password is wrong!";
                    echo json_encode($error);
                }
            }
        } else if (isset($_POST['name']) && isset($_POST['pass2'])) {
            if (empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['name']) || empty($_POST['pass2'])) {
                $error = 'please fill out all fields';
                echo json_encode($error);
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass2 = $_POST['pass2'];
                if ($pass != $pass2) {
                    $error = 'Passwords do not match.';
                    echo json_encode($error);
                } else {
                    $check = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");
                    if (mysqli_num_rows($check) > 0) {
                        $error = 'Email is already registered.';
                        echo json_encode($error);
                    } else{
                        $password = md5($pass2);

                    $insert = mysqli_query($conn, "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')");
                    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";

                    if ($insert) {
                        $msql = mysqli_query(db_conn(), $sql);
                        $user = mysqli_fetch_assoc($msql);
                        $_SESSION['user'] = $user['user_id'];
                        $success = 'registered successfully';
                        echo json_encode($success);
                    } else {
                        $error = 'Registration failed. Please try again.';
                        echo json_encode($error);
                    }
                }}
            }
        }


                    ?>