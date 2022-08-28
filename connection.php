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
function gettasks(int $condition) {
    global $db;

    $sql = "SELECT * FROM `task` WHERE `condition`= :condition";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":condition",$condition);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
/////////////////////////////