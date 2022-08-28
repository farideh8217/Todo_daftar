<?php
require "connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM task WHERE id = ?;";
$stmt = $db->prepare($sql);
$stmt->execute([
    $id
]);