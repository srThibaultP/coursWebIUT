<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="ajax3.js"></script>
<?php
require 'cnxdb.php';

echo '<label>Sélectionner un acteur </label><select id="actorid">';
foreach ($dbh->query('SELECT * from actor') as $row) {
  echo '    <option value="' . $row["actor_id"] . '">' . $row["first_name"] . ' ' . $row["last_name"] . '</option>';
}
$dbh = null;
echo '</select><button type="button" onClick="loadXMLDoc()">Afficher les films</button><div id="films"></div>';
?>