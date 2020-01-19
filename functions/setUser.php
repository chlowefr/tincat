<?php require ("database.php");

//Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (pseudo, email, password) VALUES(:pseudo, :email, :password)");

$message = "";

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    if(empty($_POST["pseudo"]) || empty($_POST["password"]) || empty($_POST["email"])){
    $message = "Veuillez renseigner tous les champs.";
    //Redirection vers la page register.php
    header("Location: ../register.php?message=$message");
    }
    else {
        $req->bindParam(":pseudo", $_POST["pseudo"]);
    }
    
    // Ajouter un input confirm password et vérifier si les deux sont égaux
    
    if($_POST["password"] === $_POST["confirm-password"]){
        $req->bindParam(":password", $_POST["password"]);
    }
    else{
        $message = "Les mots de passe de correspondent pas.";
    //Redirection vers la page register.php
    header("Location: ../register.php?message=$message");
    }


// Ajouter un champ email
$req->bindParam(":email", $_POST["email"]);

var_dump($_POST);

if($req->execute()){
    $message = "Bravo, vous êtes inscrit.";
    //Redirection vers la page register.php
        header("Location: ../register.php?message=$message");

}