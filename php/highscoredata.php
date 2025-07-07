<?php
require('../database/db.php');
//Highscore anzeigen und speichern
$count = $_SESSION['count'];

function insertPlayerScore($number){
    $mysqli = new mysqli("localhost", "root", "", "quiztest");
    $mysqli->set_charset('utf8');
    $username = $_SESSION['spieler'.$number];
    $pointCount = $_SESSION['points'.$number];
    $right = $_SESSION['right'.$number];
    $wrong = $_SESSION['wrong'.$number];
    $prozent = round(($right * 100) / $_SESSION['count'], 2); //Prozentanteil der richtigen Antworten

    $feedbackString = "INSERT INTO highscore (username, rightanswer, wronganswer, countquestion, countpercent) 
                       VALUES ('$username','$right', '$wrong', '$pointCount', '$prozent')
                       ON DUPLICATE KEY UPDATE  rightanswer = '$right', wronganswer = '$wrong',
                       countquestion = '$pointCount', countpercent = '$prozent';";
    mysqli_query($mysqli, $feedbackString);
}

if(isset($_SESSION['spieler1']))
{
    insertPlayerScore(1);
}
if(isset($_SESSION['spieler2']))
{
    insertPlayerScore(2);
}
if(isset($_SESSION['spieler3']))
{
    insertPlayerScore(3);
}
if(isset($_SESSION['spieler4']))
{
    insertPlayerScore(4);
}


$feedbackSelect = "SELECT DISTINCT username, rightanswer, wronganswer, countquestion, countpercent FROM highscore 
                       ORDER BY countquestion DESC";
$feedbackResult = mysqli_query($mysqli, $feedbackSelect);
