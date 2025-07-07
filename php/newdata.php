<?php

if (isset($_POST['frage']))
{
    $_SESSION['frage'] = $_POST['frage'];
}
$array = explode(" ", $_SESSION['frage']);
$_SESSION['points'] = intval($array[0]);
$_SESSION['category'] = $array[1];
$difficulty = $array[2];
$points = $_SESSION['points'];
$category = $_SESSION['category'];

$selectString = "SELECT * FROM quiz_data WHERE categoryNr = '$category'AND points = '$points';";
$result = mysqli_query($mysqli, $selectString);
$countQuery = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);



//Ausgabe der Fragen mit dazugehörigen Antworten etc.
$question = $row['question'];
$answer = $row['answer'];
$choiceA = $row['choice_a'];
$choiceB = $row['choice_b'];
$choiceC = $row['choice_c'];


//Antworten
if(isset($_POST['answer']))
{
    echo '<style>.answer input {background-color: green !important; color:white !important;}</style>';
}
if(isset($_POST['choiceA']))
{
    echo '<style>.choiceA input {background-color: #ab0e0e !important; color:white !important;}</style>';
}
if(isset($_POST['choiceB'])){
    echo '<style>.choiceB input {background-color: #ab0e0e !important; color:white !important;}</style>';
}
if(isset($_POST['choiceC'])){
    echo '<style>.choiceC input {background-color: #ab0e0e !important; color:white !important;}</style>';
}


/**
 * @param mixed $answer
 * @param mixed $choiceA
 * @param mixed $choiceB
 * @param mixed $choiceC
 * @return string[]
 */
// Antwortmöglichkeiten in Variablen für shuffle/random bei erneutem Seitenaufruf

function getInputArray(mixed $answer, mixed $choiceA, mixed $choiceB, mixed $choiceC): array
{
    $inputAnswer = '<div class="answer"><input type="submit" id="answer" name="answer" value="' . $answer . '" ></div>';
    $inputChoiceA = '<div class="choiceA"><input type="submit" id="choiceA" name="choiceA"  value="' . $choiceA . '" ></div>';
    $inputChoiceB = '<div class="choiceB"><input type="submit" id="choiceB" name="choiceB" value="' . $choiceB . '" ></div>';
    $inputChoiceC = '<div class="choiceC"><input type="submit" id="choiceC" name="choiceC" value="' . $choiceC . '" ></div>';


    //Variablen der Buttons in Arrays für Shuffle-Option
    $inputArray = [$inputAnswer, $inputChoiceA, $inputChoiceB, $inputChoiceC];
    shuffle($inputArray);

    echo $inputArray[0];
    echo $inputArray[1];
    echo $inputArray[2];
    echo $inputArray[3];

    
    return $inputArray;
}



function functionPlayer()
{
    if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && isset($_SESSION['spieler3']) && isset($_SESSION['spieler4']))
    {
        player4();
    }
    if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
    {
        player3();
    }
    if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && !isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
    {
        player2();
    }
    if(isset($_SESSION['spieler1']) && !isset($_SESSION['spieler2']) && !isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
    {
        player1();
    }
}


if(isset($_POST['frage'])){
 echo $_SESSION['answered'][$_SESSION['category'] . '--' . $_SESSION['points']] = true;
}
