<?php
session_start();

include_once("../connection.php");

$brand=$_POST["brand"];
$keyword=$_POST["keyword"];
$user=$_SESSION["user"];

$dbh = getConnection();

$baseRequest = " DELETE  FROM `tb_utilisateur_marque` WHERE id_utilisateur=(SELECT id_utilisateur FROM tb_utilisateur WHERE id_user=:user) AND id_marque = :brand AND keyword_marque =:keyword";
$stmt = $dbh->prepare($baseRequest);
$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
$stmt->execute();



$jsonBrand="[{\"ok\":\"true\"}]";


echo $jsonBrand;
?>


