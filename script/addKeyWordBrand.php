<?php
session_start();

include_once("../connection.php");

$brand=$_POST["brand"];
$keyword=$_POST["keyword"];
$user=$_SESSION["user"];

$dbh = getConnection();

$nbKeyword=1;
$itemList="";

$keyword=trim($keyword);

if(substr($keyword, -1)==",")
{
    $keyword=substr($keyword, 0, -1);
}



if (strpos($keyword, ',') !== false) 
{
	
  $tabKeyword = explode(",", $keyword);
  $nbKeyword=count($tabKeyword);
  $nbKeywordRefactor=$nbKeyword;
  $x=1;
  $itemList.=",";
  foreach ($tabKeyword as &$value) 
  {
    $keywordTrim = trim($value);
	$baseRequest = " INSERT INTO`tb_utilisateur_marque` (id_utilisateur,id_marque,keyword_marque) VALUES ((select id_utilisateur from tb_utilisateur where id_user=:user),:brand,:keyword)";
	
	$stmt = $dbh->prepare($baseRequest);
	$stmt->bindValue(':brand', $brand, PDO::PARAM_INT);
	$stmt->bindValue(':user', $user, PDO::PARAM_STR);
	$stmt->bindValue(':keyword', $keywordTrim, PDO::PARAM_STR);

	$stmt->execute();
	
	if($x==$nbKeyword)
		{
			
			$itemList.= " \"item".$x."Val\":\"".$keywordTrim."\" ";
			
		}
		else
		{
			
			$itemList.= " \"item".$x."Val\":\"".$keywordTrim."\", ";
			
		}
			
		$x++;
	
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

$jsonBrand="[{\"ok\":\"true\" , \"nbItem\":\"".$nbKeyword."\" ".$itemList."}]";


echo $jsonBrand;
?>


