<?php
require_once 'loader.php';
require_once 'header.php';
$conn = db_conn();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("location:$base_url/login");
    exit;
}
?>
  <a href="<?php base_url() ?>logout" class="btn btn-danger position-absolute top-0 end-0 mt-4 me-4">
    × 
</a>
<div class="d-flex align-items-center">
    <form class="translator-box">
        <select class="form-select mb-3" aria-label="Select source language" id="dir">
            <option value="english">English</option>
            <option value="persian">Persian</option>
        </select>
        <textarea class="form-control" rows="5" placeholder="Enter a word" id="wordinput"></textarea>
    </form>

    <button class="swap-btn" aria-label="Swap languages">⇄</button>

    <form class="translator-box">
        <select class="form-select mb-3" aria-label="Select target language" id="dir2">
            <option value="persian">Persian</option>
            <option value="english">English</option>
        </select>
        <textarea class="form-control" rows="5" placeholder="Translation" id="translateinput" readonly></textarea>
    </form>
</div>
<div id="result" class="mt-2"></div>

<?php
require_once 'footer.php';
?>