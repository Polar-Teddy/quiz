<?php
//Wenn die Antwort korrekt ist
if (isset($_POST['answer']))
{
//Fallunterscheidung, welcher Spieler Punkte erhält
if (isset($_SESSION['spieler1']) && $_SESSION['activePlayer'] == $_SESSION['spieler1'])
{
$_SESSION['right1']++;
$_SESSION['points1'] = $_SESSION['points1'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_SESSION['spieler2']) && $_SESSION['activePlayer'] == $_SESSION['spieler2'])
{
$_SESSION['right2']++;
$_SESSION['points2'] = $_SESSION['points2'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_SESSION['spieler3']) && $_SESSION['activePlayer'] == $_SESSION['spieler3'])
{
$_SESSION['right3']++;
$_SESSION['points3'] = $_SESSION['points3'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_SESSION['spieler4']) && $_SESSION['activePlayer'] == $_SESSION['spieler4'])
{
$_SESSION['right4']++;
$_SESSION['points4'] = $_SESSION['points4'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
}
// wenn die Antwort falsch ist
elseif (isset($_POST['choiceA']) || isset($_POST['choiceB']) || isset($_POST['choiceC']))
{
// Fallunterscheidung welcher Spiele keine Punkte erhält
//Spieler 1
if (isset($_SESSION['spieler1']) && $_SESSION['activePlayer'] == $_SESSION['spieler1'])
{
$_SESSION['wrong1']++;

if(isset($_SESSION['spieler2']))
{
echo 'Leider falsch. ' . $_SESSION['spieler2'] . ' kann es noch einmal versuchen.';

if (isset($_POST['answer']))
{
$_SESSION['right2']++;
$_SESSION['points2'] = $_SESSION['points2'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_POST['choiceA']) || isset($_POST['choiceB']) || isset($_POST['choiceC']))
{
$_SESSION['wrong2']++;

echo 'Leider auch falsch. Klicke auf Weiter um zur nächsten Frage zu gelangen.';
}
}
else{
echo 'Leider falsch. Klicke auf Weiter und wähle eine neue Frage aus.';
}
}
// Spieler 2
elseif (isset($_SESSION['spieler2']) && $_SESSION['activePlayer'] == $_SESSION['spieler2'])
{
$_SESSION['wrong2']++;

if(isset($_SESSION['spieler3']))
{
echo 'Leider falsch. ' . $_SESSION['spieler3'] . ' kann es noch einmal versuchen.';

if (isset($_POST['answer']))
{
$_SESSION['right3']++;
$_SESSION['points3'] = $_SESSION['points3'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_POST['choiceA']) || isset($_POST['choiceB']) || isset($_POST['choiceC']))
{
$_SESSION['wrong3']++;

echo 'Leider auch falsch. Klicke auf Weiter um zur nächsten Frage zu gelangen.';
}
}
else{
echo 'Leider falsch. Klicke auf Weiter und wähle eine neue Frage aus.';
}
}

// Spieler 3
elseif (isset($_SESSION['spieler3']) && $_SESSION['activePlayer'] == $_SESSION['spieler3'])
{
$_SESSION['wrong3']++;

if(isset($_SESSION['spieler4']))
{
echo 'Leider falsch. ' . $_SESSION['spieler4'] . ' kann es noch einmal versuchen.';

if (isset($_POST['answer']))
{
$_SESSION['right4']++;
$_SESSION['points4'] = $_SESSION['points4'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_POST['choiceA']) || isset($_POST['choiceB']) || isset($_POST['choiceC']))
{
$_SESSION['wrong4']++;

echo 'Leider auch falsch. Klicke auf Weiter um zur nächsten Frage zu gelangen.';
}
}
else{
echo 'Leider falsch. Klicke auf Weiter und wähle eine neue Frage aus.';
}
}

if (isset($_SESSION['spieler4']) && $_SESSION['activePlayer'] == $_SESSION['spieler4'])
{
$_SESSION['wrong4']++;

if(isset($_SESSION['spieler1']))
{
echo 'Leider falsch. ' . $_SESSION['spieler1'] . ' kann es noch einmal versuchen.';

if (isset($_POST['answer']))
{
$_SESSION['right1']++;
$_SESSION['points1'] = $_SESSION['points1'] + $_SESSION['points'];

echo 'Richtig, bitte klick auf Weiter für die nächste Frage.';
}
elseif (isset($_POST['choiceA']) || isset($_POST['choiceB']) || isset($_POST['choiceC']))
{
$_SESSION['wrong1']++;

echo 'Leider auch falsch. Klicke auf Weiter um zur nächsten Frage zu gelangen.';
}
}
else{
echo 'Leider falsch. Klicke auf Weiter und wähle eine neue Frage aus.';
}
}

}
