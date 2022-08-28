<?php
$database = [
  'host'=>'localhost',
  'dbname'=>'todo_daftar',
  'user'=>'root',
  'pass'=>''
];
try {
  $db = new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['user'], $database['pass']);
} catch (PDOException $e) {
  exit("An error happend, Error: " . $e->getMessage());
}
/////////////////////////////
function GetTasks(int $condition) {
    global $db;

    $sql = "SELECT * FROM `task` WHERE `condition`= :condition";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":condition",$condition);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
/////////////////////////////
function InsertTask($description,$condition) {
    global $db;

    $sql="INSERT INTO `task`(`description`, `condition`) VALUES (?,?)";
    $stmt =$db->prepare($sql);
    $stmt->bindParam(1, $description);
    $stmt->bindParam(2, $condition);
    $stmt->execute();

    return $stmt;
}
///////////////////////////
function SelectTask(int $id) {
    global $db;

    $sql = "SELECT * FROM `task` WHERE `id`=?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($task === false) {
      header("Location: index.php");
      exit();
    }
}
/////////////////////////////////
function UpdateTask($id,$condition) {
    global $db; 

    $sql = "UPDATE `task` SET `condition`=? WHERE `id`=?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $condition);
    $stmt->bindParam(2, $id);
    $stmt->execute();

    return $stmt;
}
///////////////////////////////
function DeleteTask(int $id) {
  global $db;

  $sql = "DELETE FROM task WHERE id = ?;";
  $stmt = $db->prepare($sql);
  $stmt->execute([
    $id
  ]);

  return $stmt;
}