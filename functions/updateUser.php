<?php
require("database.php");

var_dump($_POST["user_id"]);
var_dump($_POST["pseudo"]);

$id = $_POST["user_id"];
$pseudo = $_POST["pseudo"];

$req = $db->prepare("UPDATE users SET pseudo=? WHERE id=?");
$req->execute([$pseudo, $id]);

$message = "Bravo, le pseudo a bien été modifié !";
        header("Location: ../profils.php?message=$message");




?>