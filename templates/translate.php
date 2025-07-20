<?php
require_once 'loader.php';
require_once 'header.php';
$conn = db_conn();

?>
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
        <textarea class="form-control" rows="5" placeholder="Translation" id="translateinput"></textarea>
    </form>
</div>
<div id="result" class="mt-2"></div>

<?php
require_once 'footer.php';
?>