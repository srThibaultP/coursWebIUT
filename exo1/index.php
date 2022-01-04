<html>
<form action="index.php" method="POST">
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
<pre>
<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sakila', $user, $pass);
    echo "<p>Connexion réussie</p>";
    foreach ($dbh->query('SELECT * from actor') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
</pre>