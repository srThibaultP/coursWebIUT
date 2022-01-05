<?php
require 'login.php';
print_r($_POST);

try {
//$dbh->query("UPDATE actor SET first_name='" + $_POST["value"] +"' WHERE id ='" + $_POST["supp"] + "'");
    /*$rs = $dbh->prepare("UPDATE actor SET first_name='?' WHERE actor_id ='?'");
    $rs->execute(array($_POST["nom"], $_POST["id"]));*/
    $nom = $_POST["nom"];
    $id = $_POST["id"];
    $dbh->query("UPDATE actor SET first_name='$nom' WHERE actor_id ='$id'");
} catch (Exception $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
header("Refresh: 1;url=index.php");
?>