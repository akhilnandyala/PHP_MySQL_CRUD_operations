<?php
require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "Successfully created database and table";
} catch(PDOException $error) {
    $error->getMessage();
}
?>