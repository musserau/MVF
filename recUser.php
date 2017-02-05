<?php
session_start();

include("./script/Password.php");

$mail=$_POST["mail"];
$pass=$_POST["password"];
//$pass=hash("sha512","mVp01@ç81".$pass);
$pass = password_hash($pass, PASSWORD_BCRYPT);

$sid=session_id();
//$sid=hash("sha512","mVp01@S5I0Dç81".$sid);
$sid=password_hash($sid, PASSWORD_BCRYPT);


$stringCat=$_POST["cat"];

$stringCat = substr($stringCat, 1);
$stringCat=str_replace (";","",$stringCat);


$stringBrand=$_POST["brand"];
$stringBrand = substr($stringBrand, 1);
$stringBrand=str_replace (";","",$stringBrand);

$cookie=$_POST["rememberMe"];

include_once("./connection.php");

try {

    $dbh = getConnection();
    $dbh->beginTransaction();

    $device_token="0";
    $deviceEmpty="0";
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

   /* $stmt = $dbh->prepare("INSERT INTO device (device_id, marque, categorie,device_token,device_type,app,frequence,date,vente,product,mrproduct,favoris,todaycounter,alredaynotified)  VALUES (:device_id, :marque,:categorie,:device_token,:device_type,:app,:frequence,:dates,:vente,:product,:mrproduct,:favoris,:todaycounter,:alredaynotified)");
    $stmt->bindParam(':device_id', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':marque', $stringBrand, PDO::PARAM_STR);
    $stmt->bindParam(':categorie', $stringCat, PDO::PARAM_STR);
    $stmt->bindParam(':device_token', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':device_type', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':app', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':frequence', $device_token, PDO::PARAM_INT);
    $stmt->bindParam(':dates', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':vente', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':product', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':mrproduct', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':favoris', $deviceEmpty, PDO::PARAM_STR);
    $stmt->bindParam(':todaycounter', $device_token, PDO::PARAM_INT);
    $stmt->bindParam(':alredaynotified', $deviceEmpty, PDO::PARAM_STR);
    $stmt->execute();

    $idDevice = $dbh->lastInsertId();
*/
    //save utilisateur

    $stmt = $dbh->prepare("INSERT INTO tb_utilisateur (id_user, email,password,cookie) VALUES (:id_user, :email,:password,:cookie)");
    $stmt->bindParam(':id_user', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':cookie', $cookie, PDO::PARAM_INT);

    $stmt->execute();

    $idUser = $dbh->lastInsertId();

    //save categorie
    $arrayCat = explode(',', $stringCat);
    foreach ($arrayCat as $val) {

        $stmt = $dbh->prepare("INSERT INTO tb_utilisateur_categorie (id_utilisateur, id_categorie) VALUES (:id_utilisateur, :id_categorie)");
        $stmt->bindParam(':id_utilisateur', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':id_categorie', $val, PDO::PARAM_INT);

        $stmt->execute();
    }


    //save brand
    $arrayCBrand = explode(',', $stringBrand);
    foreach ($arrayCBrand as $val) {

        $stmt = $dbh->prepare("INSERT INTO tb_utilisateur_marque (id_utilisateur, id_marque) VALUES (:id_utilisateur, :id_marque)");
        $stmt->bindParam(':id_utilisateur', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':id_marque', $val, PDO::PARAM_INT);

        $stmt->execute();
    }

    $dbh->commit();
    /*$stmt = $dbh->prepare("INSERT INTO userDevice (id_user, id_device) VALUES (:id_user, :id_device)");
    $stmt->bindParam(':id_user', $idUser, PDO::PARAM_STR);
    $stmt->bindParam(':id_device', $sid, PDO::PARAM_STR);
    $stmt->execute();

    $dbh->commit();*/

    if($cookie==1){
        setcookie('ssu', $sid, time() + 365*24*3600, null, null, false, true);
    }

    $_SESSION["user"]=$sid;
    $_SESSION["favCat"]=$stringCat;
    $_SESSION["favBrand"]=$stringBrand;
    $_SESSION["rememberMe"]=$cookie;
    $_SESSION["firstConnexion"]=1;
    $_SESSION["email"]= $mail;
    $_SESSION["notifMail"]= "0";
    $_SESSION["notifCounter"]="";



    //send mail

    $mail = 'marc.usserau@gmail.com'; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Bonjour, Ceci est un mail de confirmation d'inscription. Merci et bonne navigation ;)";
    $message_html = "<html><head></head><body><b>Bonjour</b>, <br> Ceci est un mail de confirmation d'inscription.<br> Merci et bonne navigation ;)</body></html>";
    //==========

    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========

    //=====Définition du sujet.
    $sujet = "Bonjour et bienvenue chez MVF!!!";
    //=========

    //=====Création du header de l'e-mail.
    $header = "From: \"MVH\"<mvh@gmail.com>".$passage_ligne;
    $header.= "Reply-to: \"MVH\"<mvh@gmail.com>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    //=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);
    //==========




echo "[{\"ok\":\"true\"}]";
}
catch(Exception $e)
{
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
    $dbh->rollBack();
}


?>

