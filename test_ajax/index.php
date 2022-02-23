<script src="ajax.js"></script>
<?php
require 'cnxdb.php';

echo "<label>Sélectionner un acteur </label><select>";
foreach ($dbh->query('SELECT * from actor') as $row) {
  echo '    <option value="' . $row["actor_id"] . '>' . $row["first_name"] . ' ' . $row["last_name"] . '</option>';
}
$dbh = null;
echo '</select><button type="button" onClick="loadXMLDoc()">Afficher les films</button><div id="films"></div>';
?>