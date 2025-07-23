<?php
function create_tables()
{
    $create_users = 'CREATE TABLE IF NOT EXISTS `users`(
      `user_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      `name` VARCHAR(50) NULL,
      `email` VARCHAR(100) NULL,
      `password` TEXT NULL,
      `create_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    );';
    mysqli_query(db_conn(), $create_users);
    $create_words = 'CREATE TABLE IF NOT EXISTS `words` (
        `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `word` TEXT NULL,
        `translate` TEXT NULL
    );';
    mysqli_query(db_conn(), $create_words);
}
create_tables();
