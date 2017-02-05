<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 28/12/2016
 * Time: 19:44
 */

function getConnection()
{
    //$host = "localhost";

    $host="127.0.0.1";

    $dbname = "venteflashV2";
    $user = "root";
    $pwd = "";

   /* $dbname = "venteflash_testsite";
    $user="93889";
    $pwd="v76NnPf7";
*/
    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pwd);
        return $bdd;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

?>