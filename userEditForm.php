<?php
require("head.php");
require("functions/database.php");

//SI session pseudo vide
    if(empty($_SESSION["pseudo"])){
        //redirige vers login
        header("Location: login.php");
    }

    $req = $db->prepare("SELECT pseudo FROM users WHERE id = :id");
    $req->bindParam(":id", $_GET["user_id"]);

    $req->execute();

    $result = $req->fetch(PDO::FETCH_ASSOC);

?>
<div class="section1">
    <div class="form-container"> 
        <img src="src/img/Logo.png" alt="">
        <h2>Modifier un pseudo</h2>
        <form action="functions/updateUser.php" method="post">
                <input type="text" placeholder="Nouveau pseudo" name="pseudo" value="<?php echo $result['pseudo']; ?>">
                <input type="hidden" placeholder="id" name="user_id" value="<?php echo $_GET["user_id"]; ?>">
                <input type="submit" placeholder="Update" value="Update">
        </form>
    </div>

</div>
