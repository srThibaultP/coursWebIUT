
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
require 'login.php';

//print_r($_POST);
/*$user = 'rt';
$pass = 'rtlry';*/


//$dbh = new PDO('mysql:host=localhost;dbname=sakila', $user, $pass);
echo "<table border=1 class='table table-danger table-striped'>";
foreach ($dbh->query('SELECT * from actor LIMIT 20') as $row) {
    //print_r($row);
    echo '<tr>
            <td>' . $row["first_name"] . '</td>
            <td>' . $row["last_name"] . '</td>
            <td><form method="post" action="supp.php"><input type="hidden" name="id" value="' . $row['actor_id'] . '" />
            <input type="form" name="nom"/ required>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Modifier</button></form></td>
            </tr>';
}
$dbh = null;
echo "</table>";
?>