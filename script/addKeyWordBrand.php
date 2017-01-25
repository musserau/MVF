<?php
session_start();

include_once("../connection.php");

$brand=$_POST["brand"];
$keyword=$_POST["keyword"];
$user=$_SESSION["user"];

$dbh = getConnection();



if (strpos($keyword, ',') !== false) 
{
	
  $tabKeyword = explode(",", $keyword);
  foreach ($tabKeyword as &$value) 
  {
    $keywordTrim = trim($value);
	$baseRequest = " INSERT INTO`tb_utilisateur_marque` (id_utilisateur,id_marque,keyword_marque) VALUES ((select id_utilisateur from tb_utilisateur where id_user=:user),:brand,:keyword)";
	
	$stmt = $dbh->prepare($baseRequest);
	$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
	$stmt->bindValue(':user', $user, PDO::PARAM_STR);
	$stmt->bindValue(':keyword', $keywordTrim, PDO::PARAM_STR);

	$stmt->execute();
	
	}

}
else
{
	$baseRequest = " INSERT INTO`tb_utilisateur_marque` (id_utilisateur,id_marque,keyword_marque) VALUES ((select id_utilisateur from tb_utilisateur where id_user=:user),:brand,:keyword)";
	$stmt = $dbh->prepare($baseRequest);
	$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
	$stmt->bindValue(':user', $user, PDO::PARAM_STR);
	$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
	$stmt->execute();
}

$jsonBrand="[{\"ok\":\"true\"}]";


echo $jsonBrand;
?>


