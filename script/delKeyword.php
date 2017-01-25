<?php
session_start();

include_once("../connection.php");

$keyword=$_POST["keyword"];


$dbh = getConnection();

$baseRequest = " DELETE  FROM `tb_keyword_produit` WHERE id_keyword_produit = :keyword";
$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
$stmt->execute();



$jsonBrand="[{\"ok\":\"true\"}]";


echo $jsonBrand;
?>


