<html lang="fr">
<form id=entetec action="index.php" method="POST">
    </li>

    <p>
        <label>Identifiant :</label>
        <input type="text" name="user" />
    </p>
    <p>
        <label>Mot de passe :</label>
        <input type="password" name="pass" />

        <input type="submit" value="Connexion" />
    </p>
</form>

</html>

<?php
$user = $_POST["user"];
$pass = $_POST["pass"];
$dbh = new PDO('mysql:host=localhost;dbname=sakila', $user, $pass);
echo "Connexion réussie";
?>