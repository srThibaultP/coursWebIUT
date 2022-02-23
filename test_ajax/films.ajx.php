<?php
require 'cnxdb.php';

foreach ($dbh->query('SELECT actor.actor_id, actor.first_name, actor.last_name, actor.last_update , film.title FROM `actor` 
                      INNER JOIN film_actor ON film_actor.actor_id = actor.actor_id 
                      INNER JOIN film ON film.film_id = film_actor.film_id
                      WHERE actor.actor_id = 1') as $row) {
  echo $row["title"];
  echo '</br>';
}
$dbh = null;
?>