<?php
session_start();

include("./script/Password.php");

$mail=$_POST["mail"];
$pass=$_POST["password"];
//$pass=hash("sha512","mVp01@ç81".$pass);
$pass = password_hash($pass, PASSWORD_BCRYPT);
$pass=$_POST["password"];
$sid=session_id();
//$sid=hash("sha512","mVp01@S5I0Dç81".$sid);
$sid=password_hash($sid, PASSWORD_BCRYPT);



$cookie=$_POST["rememberMe"];


include_once("./connection.php");

try {

    $dbh = getConnection();
    $dbh->beginTransaction();
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


    // penser a recuperer les marque cat favoris etc..



    $stmt = $dbh->prepare("select * from tb_utilisateur WHERE email = :email ");


    $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
   // $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
    if ($stmt->execute())
    {
        $count = $stmt->rowCount();

        if($count!= 1)
        {

            echo "[{\"ok\":\"false\"}]";
        }
        else
        {



            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {

                if (password_verify($pass, $row["password"]))
                {



                    /* Valid */
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["rememberMe"] = $row["cookie"];
                    $_SESSION["notifMail"] = $row["notif_mail"];
                    $_SESSION["notifCounter"] = $row["notif_counter"];
                    $_SESSION["user"] = $row["id_user"];
                    $_SESSION["firstConnexion"] = 0;

                    if($cookie==1){
                        setcookie('ssu', $row["id_user"], time() + 365*24*3600, null, null, false, true);
                    }

                    echo "[{\"ok\":\"true\"}]";
                } else {
                    /* Invalid */
                    echo "[{\"ok\":\"false\"}]";
                }



            }



        }

    }




}
catch(Exception $e)
{
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}


?>

