<?php
//Datenbank-Aufbau und Error-Message
$mysqli = new mysqli("localhost", "root", "", "quiztest");
$mysqli->set_charset('utf8');

if ($mysqli->connect_errno)
{
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error;
    exit();
}





