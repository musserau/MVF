<?php
session_start();

include_once("../connection.php");

$frequence=$_POST["frequence"];
$user=$_SESSION["user"];

$dbh = getConnection();

$baseRequest = " UPDATE tb_utilisateur set id_frequence= :frequence
		         WHERE id_user = :user";

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue(':frequence', $frequence, PDO::PARAM_INT);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);

$stmt->execute();

$json="[{\"update\":\"true\"}]";


echo $json;
?>


