<?php
session_start();

include_once("../connection.php");

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
  foreach ($tabKeyword as &$value) 
  {
	  
    $keywordTrim = trim($value);
	
		$baseRequest = " INSERT INTO`tb_keyword_produit` (libelle,id_utilisateur) VALUES ( :keyword,(select id_utilisateur from tb_utilisateur where id_user=:user))";
		$dbh->beginTransaction();
		$stmt = $dbh->prepare($baseRequest);
		$stmt->bindValue(':user', $user, PDO::PARAM_STR);
		$stmt->bindValue(':keyword', $keywordTrim, PDO::PARAM_STR);

		$stmt->execute();
		$id= $dbh->lastInsertId(); 
		$dbh->commit();

		if($x==$nbKeyword)
		{
			
			$itemList.= " \"item".$x."Val\":\"".$keywordTrim."\" , \"item".$x."Id\":\"".$id."\"";
			
		}
		else
		{
			
			$itemList.= " \"item".$x."Val\":\"".$keywordTrim."\" , \"item".$x."Id\":\"".$id."\" , ";
			
		}
			
		$x++;
	
	
   }

}
else
{
	$baseRequest = " INSERT INTO`tb_keyword_produit` (libelle,id_utilisateur) VALUES (:keyword,(select id_utilisateur from tb_utilisateur where id_user=:user))";
	$dbh->beginTransaction();
	$stmt = $dbh->prepare($baseRequest);
	$stmt->bindValue(':user', $user, PDO::PARAM_STR);
	$stmt->bindValue(':keyword', $keyword, PDO::PARAM_STR);
	$stmt->execute();
	$id= $dbh->lastInsertId(); 
	$dbh->commit();
    
	
	$itemList.=" \"itemId\":\"".$id."\"";
	
}

$jsonBrand="[{\"ok\":\"true\" , \"nbItem\":\"".$nbKeyword."\" ,".$itemList."}]";


echo $jsonBrand;
?>


