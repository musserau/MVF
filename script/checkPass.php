<?php

session_start();

include("./Password.php");
$password=$_POST["password"];



$baseRequest = "
		select password
		FROM tb_utilisateur 
		WHERE id_user = :user";

include_once("../connection.php");


$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue('user', $_SESSION["user"], PDO::PARAM_STR);


$stmt->execute();
$result = $stmt->fetch();
$passwordBdd=$result["password"];


if (password_verify($password, $passwordBdd))
{
    $jsonBrand="[{\"ok\":\"true\"}]";
}else
{
    $jsonBrand="[{\"ok\":\"false\"}]";
}



echo $jsonBrand;


?>


