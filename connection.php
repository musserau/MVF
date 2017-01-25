<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 28/12/2016
 * Time: 19:44
 */

function getConnection()
{
    $host = "localhost";
    $dbname = "venteflashV2";
    $user = "root";
    $pwd = "";

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