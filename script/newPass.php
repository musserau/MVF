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


if($nbmail!=0)
{
    $idConnexion = uniqid();


    $dbh = getConnection();
    $dbh->beginTransaction();

    $stmt = $dbh->prepare("INSERT INTO tb_newPass (email, id_genere) VALUES (:email,:id_genere)");
    $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':id_genere', $idConnexion, PDO::PARAM_STR);
    $stmt->execute();

    $dbh->commit();



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
    $message_html = "<html><head></head><body><b>Bonjour</b>, <br> Voici un <a href=\"./parametre.php?mail=".$mail."&newPass=yes&id=".$idConnexion." \">lien</a> pour redefinir ton mot de passe.<br> Merci et bonne navigation ;)</body></html>";
    //==========

    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========
    //=====Définition du sujet.
    $sujet = "MVF - Nouveau mot de passe";
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



    $jsonBrand="[{\"mailExist\":\"true\"}]";
}
else
{
    $jsonBrand="[{\"mailExist\":\"false\"}]";
}

echo $jsonBrand;


?>


