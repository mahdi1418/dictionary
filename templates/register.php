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

<title>Register</title>
<div id="result" class="mb-4">
</div>
<div class="card">
    <h3 class="text-center mb-4">Register</h3>
    <form method="POST" id="register">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="confrim Password" id="pass2" name="confrimpass" required>
        </div>
        <button type="submit" class="btn btn-outline-light w-100">Register</button>
        <a href="<?php base_url() ?>login" class="link-btn">Already have an account? Login</a>
    </form>
</div>
<?php
require_once 'footer.php';
?>