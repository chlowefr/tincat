<?php
require("database.php");

var_dump($_POST["user_id"]);
var_dump($_POST["pseudo"]);

$sql = "UPDATE users SET pseudo=? WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $surname, $sex, $id]);




?>