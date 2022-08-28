<?php
require "connection.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$id = $_GET["id"];
DeleteTask($id);
header("location: index.php");
exit();