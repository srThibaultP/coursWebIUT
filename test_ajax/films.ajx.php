<?php
require 'cnxdb.php';
$stmt = $dbh->prepare('SELECT film.title FROM `actor` 
                      INNER JOIN film_actor ON film_actor.actor_id = actor.actor_id 
                      INNER JOIN film ON film.film_id = film_actor.film_id
                      WHERE actor.actor_id = :actorid');
$stmt->execute(array(':actorid' => $_POST["actorid"]));
while ($row = $stmt->fetch()) {
    echo $row["title"];
    echo '</br>';
}
$dbh = null;
?>