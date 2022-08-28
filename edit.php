<?php
require "connection.php";

if (!isset($_GET["id"])) {
  header("Location: index.php");
  exit();
}
$id = $_GET['id'];

SelectTask($id);

if (isset($_POST['submit'])) {
    $condition = $_POST["condition"];
    
    UpdateTask($id,$condition);
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <select name="condition">
            <option value="0">به زودی-0</option>
            <option value="1">درحال انجام-1</option>
            <option value="2">انجام شده-2</option>
        </select><br><br>
        <input type="submit" name="submit" value="insert"> 
    </form>
</body>
</html>