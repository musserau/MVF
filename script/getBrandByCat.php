<?php

$stringCat=$_POST["cat"];
$stringCat = substr($stringCat, 1);
$stringCat=str_replace (";","",$stringCat);
$arrayCat = explode(",", $stringCat);

$whereCat="";

$i = 0;
$len = count($arrayCat);		


$baseRequest = "
		select m.id_marque as id, m.nom as nom , m.logo as logo, v.id_vente as vid 
		FROM tb_marque as m 
		left join tb_vente as v on m.id_marque=v.marque 
		WHERE 1
		AND ";
		
$i=0;
foreach($arrayCat as $value)
{	
	if($i==0)
	{
		$baseRequest.=" m.categorie in (:cat".$i.")";
	}
	else
	{
		$baseRequest.=" OR m.categorie in (:cat".$i.")";
	}

$i++;
}

include_once("../connection.php");


$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$i=0;
foreach($arrayCat as $value)
{
	$stmt->bindValue('cat'.$i, $value, PDO::PARAM_INT);
	$i++;
}

$stmt->execute();
$result = $stmt->fetchAll();

$jsonBrand="[";

$x = 1;
$len = count($result);

foreach ($result as $row)
{

	$jsonBrand.="{\"id\":\"".$row["id"]."\",";
	$jsonBrand.="\"logo\":\"".$row["logo"]."\"";
	$jsonBrand.="}";
	//echo end($result);
	if ($x != $len)
	{
		$jsonBrand.=",";
	}
	$x++;
}
	
$jsonBrand.="]";

echo $jsonBrand;


?>


