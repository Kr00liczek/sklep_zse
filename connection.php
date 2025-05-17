<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "sklep_zse";

$conn = new mysqli($host, $user, $pwd, $db);

if ($conn -> connect_error)
    {die("Komunikat błędu: ".$conn -> connect_error);}

?>