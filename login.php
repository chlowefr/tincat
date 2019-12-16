<?php require "head.php" ?>

<body>
    <div class="form-container"> 
    <a href="index.php" class="link-img"><img src="src/img/Logo.png" alt=""></a> 
    <a href="index.php"><h1>TINCAT</h1></a> 
    <form action="functions/setUser.php" method="post">
        <input type="text" placeholder="Pseudo" name="pseudo">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" placeholder="Submit" value="Register">
    </form>
        <a href="register.php" class="link">Inscription</a>
    </div>
</body>
</html>