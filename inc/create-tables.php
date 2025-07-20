<?php
function create_tables()
{
    $create_words = 'CREATE TABLE IF NOT EXISTS `words` (
        `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `word` TEXT NULL,
        `translate` TEXT NULL
    );';
    mysqli_query(db_conn(), $create_words);
}
create_tables();
