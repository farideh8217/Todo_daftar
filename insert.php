<?php
include_once "connection.php";
if (isset($_POST["submit"])) {
    $description = $_POST["description"];
    $condition = $_POST["condition"];
    $sql="INSERT INTO `task`(`description`, `condition`) VALUES (?,?)";
    $stmt =$db->prepare($sql);
    $stmt->bindParam(1,$description);
    $stmt->bindParam(2,$condition);
    $stmt->execute();
    
    header("Location: index.php");
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
        description:<br><textarea name="description" rows="4" cols="50"></textarea><br>
        <select name="condition">
            <option value="0">به زودی-0</option>
            <option value="1">درحال انجام-1</option>
            <option value="2">انجام شده-2</option>
        </select><br><br>
        <input type="submit" name="submit" value="insert"> 
    </form>
</body>
</html>