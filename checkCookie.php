<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 28/12/2016
 * Time: 19:28
 */

include_once("connection.php");

//session_destroy();
if(!isset($_SESSION)) {
    session_start();

}
else
{
	session_destroy();
}
$dbh = getConnection();

if(!is_null($dbh))
{

//echo $_COOKIE['ssu'];
    if(isset($_COOKIE['ssu']))
    {

        $ssid = $_COOKIE["ssu"];

        //check ssid in cookie
        // changer une fois la bdd ok
        $stmt = $dbh->prepare("SELECT id_user,email,cookie,notif_mail,notif_counter,cookie
                               FROM tb_utilisateur 
                                where id_user = ?");

        if ($stmt->execute(array($ssid)))
        {
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        }

        $count = $stmt->rowCount();

        if($count == 1)
        {
          /*  $_SESSION["user"] = $_COOKIE['ssu'];
            $_SESSION["email"] = $result["email"];
            $_SESSION["rememberMe"]=$result["cookie"];
            $_SESSION["notifMail"]=$result["notif_mail"];
            $_SESSION["notifCounter"]= $result["notif_counter"];*/


        }

    }

}
$dbh = null;
?>