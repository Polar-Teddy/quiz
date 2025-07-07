<?php
//Variablen 1. Button fuer Auswahl
if ((isset($_POST['quantity_topic'])))
{
    $quanTopic = $_POST['quantity_topic'];
}

//Funktion für Formular-Felder
function formMaker($divName, $bezeichnung, $name, $a, $b)
{
    echo '<div class="' . $divName . '">
                <label for="' . $name . $b . '"><b>' . $bezeichnung . ' ' . ($b + 1) . '</b></label><br>
                <input type="text" id="' . $name . $b . '" name="topic[' . $a . '][' . $b . '][' . $name . ']" ><br>
                </div>';
}

//Funktion für Button-Erstellung der Anzahl-Auswahl der Fragen
function countQuestion($key, $value)
{
    echo '<li><button type="submit" name="frage" value="' . $key . ' ' . $value . '">' . $key . ' Fragen</button></li>';
}

//Funktion für Validierung
function validate($data)
{
    $validateData = htmlspecialchars(trim(strip_tags(stripslashes($data))));

    return $validateData || die ("Es ist etwas fehlgeschlagen. Versuche es erneut.");
}

function questionPoints($key, $value, $difficulty)
{
    $points = $key;
    $category = $value;
    $sessionKeyAnswers = $category . '--' . $points;

    if (isset($_SESSION['answered'][$sessionKeyAnswers])) {
        echo '<li><button disabled="disabled" type="butto" id="frage" name="frage" value="' . $key . ' ' . $value . ' ' . $difficulty . '" >' . $key . '</button></li>';
    } else {
        echo '<li><button type="submit" id="frage" name="frage" value="' . $key . ' ' . $value . ' ' . $difficulty . '" >' . $key . '</button></li>';
    }

}
