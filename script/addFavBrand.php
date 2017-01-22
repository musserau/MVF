<?php
session_start();

include_once("../connection.php");

$brand=$_POST["brand"];
$user=$_SESSION["user"];

$baseRequest = " INSERT INTO`tb_utilisateur_marque` (id_utilisateur,id_marque) VALUES ((select id_utilisateur from tb_utilisateur where id_user=:user),:brand)";
$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
$stmt->bindValue(':user', $user, PDO::PARAM_INT);

$stmt->execute();


$sql="SELECT logo,nom FROM tb_marque WHERE id_marque= :brand";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);

$stmt->execute();
$row = $stmt->fetch();


$jsonBrand="[{\"ok\":\"true\",\"logo\":\"".$row["logo"]."\",\"nom\":\"".$row["nom"]."\"}]";


echo $jsonBrand;
?>


