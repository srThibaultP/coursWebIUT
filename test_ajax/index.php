<?php
require 'cnxdb.php';

echo "<label>Sélectionner un acteur </label><select>";
foreach ($dbh->query('SELECT * from actor') as $row) {
  echo '    <option>' . $row["first_name"] . ' ' . $row["last_name"] . '</option>';
}
$dbh = null;
echo '<button type="button">Afficher les films</button></select>';
?>