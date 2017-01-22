<?php

$mail=$_POST["mail"];

$baseRequest = "
		select count(email) as mail 
		FROM tb_utilisateur 
		WHERE email = :mail";
		



include_once("../connection.php");


$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue('mail', $mail, PDO::PARAM_STR);


$stmt->execute();
$result = $stmt->fetch();
$nbmail=$result["mail"];


if($nbmail==0)
{
    $jsonBrand="[{\"mailUnique\":\"true\"}]";

}
else
{
    $jsonBrand="[{\"mailUnique\":\"false\"}]";
}

echo $jsonBrand;


?>


