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

<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sakila', $user, $pass);
    echo "<p>Connexion réussie</p><table border=1>";
    foreach ($dbh->query('SELECT * from actor LIMIT 20') as $row) {
        //print_r($row);
        echo "<tr>
            <td>" . $row["actor_id"] . "</td>
            <td>" . $row["first_name"] . "</td>
            <td>" . $row["last_name"] . "</td>
            <td>" . $row["last_update"] . "</td>
            </tr>";
    }
    $dbh = null;
    echo "</table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>