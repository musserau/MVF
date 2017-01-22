<?php
session_start();
$brand=$_POST["input"];


$baseRequest = "select distinct(m.id_marque) as id, m.nom as nom  
		FROM tb_marque as m 
		left join tb_vente as v on m.id_marque=v.marque 
		WHERE m.nom like :brand
		Limit 15";

include_once("../connection.php");


$dbh = getConnection();

$stmt = $dbh->prepare($baseRequest);

$stmt->bindValue('brand', $brand."%", PDO::PARAM_STR);


$stmt->execute();
$result = $stmt->fetchAll();


$res="";

$len = count($result);

if($len ==0)
{
    $res="Pas de résultat";
}

$sql = "SELECT DISTINCT (m.id_marque) as mid  ";
$sql .= "FROM tb_utilisateur_marque as um ";
$sql .= "LEFT JOIN tb_utilisateur as u on um.id_utilisateur =u.id_utilisateur ";
$sql .= "LEFT JOIN tb_marque as m on um.id_marque = m.id_marque ";
$sql .= "WHERE u.id_user = :user ";
$dbh = getConnection();

$stmtBrand = $dbh->prepare($sql);

$stmtBrand->bindParam(':user', $_SESSION["user"], PDO::PARAM_STR);

$stmtBrand->execute();
$arrayFavBrand = $stmtBrand->fetchAll(PDO::FETCH_COLUMN);




foreach ($result as $row)
{
    $matchStringBold = preg_replace('/('.$brand.')/i', '<strong>$1</strong>', $row["nom"]); // Replace text field input by bold one
   // $res.= '<li id="'.$row["id"].'">
    if(in_array($row["id"],$arrayFavBrand))
    {
    $res.='<div class="checkbox">
                        <input onclick="addFavBrand('.$row["id"].')" checked  id="checkboxItem'.$row["id"].'"  type="checkbox" >
                        <label for="checkboxItem'.$row["id"].'"> '.$matchStringBold.'</label>
                    </div>';
    }
    else
    {
        $res.='<div class="checkbox">
                        <input onclick="addFavBrand('.$row["id"].')"  id="checkboxItem'.$row["id"].'"  type="checkbox" >
                        <label for="checkboxItem'.$row["id"].'"> '.$matchStringBold.'</label>
                    </div>';
    }

    		//</li>';

}
	


echo $res;

?>

