<?php
session_start();

include_once("../connection.php");

$brand=$_POST["brand"];
$user=$_SESSION["user"];


$baseRequest = " DELETE `tb_utilisateur_marque`
                FROM `tb_utilisateur_marque` 
                LEFT JOIN `tb_utilisateur` on `tb_utilisateur_marque`.`id_utilisateur`=`tb_utilisateur`.`id_utilisateur` 
                WHERE `tb_utilisateur`.`id_user` = :user
                AND `tb_utilisateur_marque`.`id_marque` = :brand";
$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
$stmt->bindValue(':user', $user, PDO::PARAM_INT);

$stmt->execute();

$jsonBrand="[{\"ok\":\"true\"}]";


echo $jsonBrand;
?>


