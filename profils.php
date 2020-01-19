<?php
require("head.php");

    //SI session pseudo vide
    if(empty($_SESSION["pseudo"])){
        //redirige vers login
        header("Location: login.php");
    }
?>
<div class="section1">
<div class="bonjour-pseudo"><?php echo "Bonjour " . $_SESSION["pseudo"];?></div>


<p>
   <?php
        //Afficher le succès du changement de pseudo
        if(isset($_GET["message"])){
            echo $_GET["message"];
        }
?> 
</p>
<?php

// *****************************************************
//Afficher tous les utilisateurs de la BDD sauf moi 

// 1 : connect to database
require("functions/database.php");

// 2 : prepare request (SELECT) SANS le pseudo de l'utilisateur connecté
$req = $db->prepare("SELECT id, pseudo FROM users WHERE pseudo <> :pseudo");
$req->bindParam(":pseudo", $_SESSION["pseudo"]);

// 3 : execute
$req->execute();
?>

<div class="container-pseudo-suppr">
<?php
// 4 : boucle
while($result = $req->fetch(PDO::FETCH_ASSOC)){
    ?>

    <div class="pseudo-container">
        <strong><?php echo $result['pseudo']; ?></strong>
        <button><a href="functions/deleteUser.php?user_id=<?= $result['id'] ?>">Supprimer</a></button>
        <button><a href="userEditForm.php?user_id=<?= $result['id'] ?>">Edit</a></button>
    </div>
    
    <?php
}
?>

</div>

<div class="message-profil">
<?php
if(isset($_GET["message"])){
    echo $_GET["message"];
}
?>
</div>

<!-- ***************************************************** -->

<a href="functions/disconnect.php" class="disconnect">Disconnect</a>

</div>