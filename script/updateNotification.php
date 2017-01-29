<?php
session_start();

include_once("../connection.php");

$isCheck=$_POST["isCheck"];
$notification=$_POST["notification"];
$user=$_SESSION["user"];

$dbh = getConnection();

if($isCheck==0)
{

    $baseRequest = " DELETE  FROM `tb_utilisateur_notification` WHERE id_utilisateur=(SELECT id_utilisateur FROM tb_utilisateur WHERE id_user=:user) AND id_notification_delais = :rappel  ";

    $stmt = $dbh->prepare($baseRequest);

    $stmt->bindValue(':rappel', $notification, PDO::PARAM_INT);
    $stmt->bindValue(':user', $_SESSION["user"], PDO::PARAM_STR);
    $stmt->execute();
}
if($isCheck==1)
{
    $baseRequest = " INSERT INTO`tb_utilisateur_notification` (id_utilisateur,id_notification_delais) VALUES ((select id_utilisateur from tb_utilisateur where id_user=:user),:rappel)";
    $dbh = getConnection();

    $stmt = $dbh->prepare($baseRequest);

    $stmt->bindValue(':rappel', $notification, PDO::PARAM_INT);
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);

    $stmt->execute();

}




$json="[{\"update\":\"true\"}]";


echo $json;
?>


