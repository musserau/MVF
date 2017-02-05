<?php
session_start();

include_once("../connection.php");
include("./Password.php");
$mail=$_POST["mail"];
$password=$_POST["password"];
$id=$_POST["id"];
$rememberMe=$_POST["rememberMe"];



$dbh = getConnection();


$baseRequest = "
		select count(email) as mail 
		FROM tb_new_pass 
		WHERE email = :mail 
		AND id_genere= :id";

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue('mail', $mail, PDO::PARAM_STR);
$stmt->bindValue('id', $id, PDO::PARAM_STR);



$stmt->execute();
$result = $stmt->fetch();
$nbmail=$result["mail"];


if($nbmail==0)
{
    $jsonBrand="[{\"ok\":\"false\"}]";

}
else
{

    $password = password_hash($password, PASSWORD_BCRYPT);

    $baseRequest = " update `tb_utilisateur` set cookie=:cookie,password= :password where  email=:mail";
    $dbh = getConnection();

    $stmt = $dbh->prepare($baseRequest);
    $stmt->bindValue(':cookie', $rememberMe, PDO::PARAM_INT);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();



    // suppression de l'id si on veut que le lien ne fonctionne plus

    $jsonBrand="[{\"ok\":\"true\"}]";
}


echo $jsonBrand;
?>


