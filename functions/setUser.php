<?php
// Etape 1: config database
$DB_HOST = "localhost";
$DB_NAME = "tincat";
$DB_USER = "root";
$DB_PASSWORD = "root";
// Etape 2: Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
//Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (pseudo, email, password) VALUES(:pseudo, :email, :password)");

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    if($_POST["pseudo"] == "" || $_POST["password"] == "" || $_POST["email"] == ""){
    echo "Veuillez renseigner tous les champs.";
    //Redirection vers la page register.php
    header("Location: ../register.php?inputNone=Veuillez renseigner tous les champs.");
    }
    else {
        $req->bindParam(":pseudo", $_POST["pseudo"]);
    }

    // Ajouter un input confirm password et vérifier si les deux sont égaux
    
    if($_POST["password"] === $_POST["confirm-password"]){
        $req->bindParam(":password", $_POST["password"]);
    }
    else{
        echo "Les mots de passe de correspondent pas.";
    //Redirection vers la page register.php
    header("Location: ../register.php?errorPassword=Les mots de passe de correspondent pas.");
    }


// Ajouter un champ email
$req->bindParam(":email", $_POST["email"]);

var_dump($_POST);

$req->execute();

if($req->execute()){
    echo "Bravo, vous êtes inscrit.";
        //Redirection vers la page register.php
        header("Location: ../register.php?success=Bravo, vous êtes inscrit.");

}