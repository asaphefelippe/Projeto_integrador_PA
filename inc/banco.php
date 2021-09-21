<?php


define("HOME","http://turmatecinfo2021.web2200.uni5.net/pa/");


define("DB_HOST", "mysql25-farm2.uni5.net");
define("DB_NAME", "turmatecinfo2001");
define("DB_USER", "turmatecinfo2001");
define("DB_PASS", "equipepa2021");

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

?>
