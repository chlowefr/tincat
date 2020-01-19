<?php require ("database.php");

echo "delete user script";

var_dump($_GET);


// 1 : connect to database
require("database.php");

// 2 : prepare request (SELECT) SANS le pseudo de l'utilisateur connecté
$req = $db->prepare("DELETE  FROM users WHERE id=:id");
$req->bindParam(":id", $_GET["user_id"]);

// 3 : execute
$req->execute();

$message = "Le profil a bien été supprimé.";
header("Location: ../profils.php?message=$message");

?>

