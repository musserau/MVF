<?php
session_start();

include_once("../connection.php");

$notifMail=$_POST["notif"];
$user=$_SESSION["user"];


$baseRequest = " UPDATE tb_utilisateur set notif_mail= :notif_mail
		         WHERE id_user = :user";

$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue('notif_mail', $notifMail, PDO::PARAM_INT);
$stmt->bindValue('user', $user, PDO::PARAM_STR);

$stmt->execute();

$jsonBrand="[{\"update\":\"true\"}]";


$_SESSION["firstConnexion"]="0";

echo $jsonBrand;
?>


