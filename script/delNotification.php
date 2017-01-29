<?php
session_start();

include_once("../connection.php");

$notification=$_POST["notification"];

$dbh = getConnection();

$baseRequest = " DELETE  FROM `tb_utilisateur_notification` WHERE id_utilisateur=(SELECT id_utilisateur FROM tb_utilisateur WHERE id_user=:user) AND id_notification_delais = :rappel   ";

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue(':rappel', $notification, PDO::PARAM_INT);
$stmt->bindValue(':user', $_SESSION["user"], PDO::PARAM_STR);
$stmt->execute();

$jsonBrand="[{\"ok\":\"true\"}]";

echo $jsonBrand;
?>


