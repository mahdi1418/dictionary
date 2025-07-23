<?php
require_once 'loader.php';
require_once 'header2.php';
$conn = db_conn();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    header("location:$base_url/translate");
    exit;
}
?>

<title>Login</title>
<div id="result" class="mb-4">
</div>

<div class="card">
    <h3 class="text-center mb-4">Login</h3>
    <form method="POST" id="login">
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" required>
        </div>
        <button type="submit" class="btn btn-outline-light w-100">Login</button>
        <a href="<?php base_url() ?>register" class="link-btn">Don't have an account? Register</a>
    </form>
</div>
<?php
require_once 'footer.php';
?>