<?php
//Session-Variablen deklarieren
if (!isset($_SESSION['count']) or (isset($_GET['init'])))
{
    $_SESSION['pointCount'] = 0;
    $_SESSION['count'] = 0;
}

function getPlayerSessionVar($number)
{
    $_SESSION['spieler'.$number] = htmlspecialchars(trim(strip_tags(stripslashes($_POST['spieler'.$number]))));
    $_SESSION['right'.$number] = 0;
    $_SESSION['wrong'.$number] = 0;
    $_SESSION['points'.$number] = 0;

}

//Session Variablen je nach gewähltem Spieler
if(isset($_POST['player']))
{
    if(isset($_POST['spieler1']) && isset($_POST['spieler2']) && isset($_POST['spieler3']) && isset($_POST['spieler4']))
    {

        getPlayerSessionVar(1);
        getPlayerSessionVar(2);
        getPlayerSessionVar(3);
        getPlayerSessionVar(4);
        $_SESSION['array']= [$_SESSION['spieler1'], $_SESSION['spieler2'], $_SESSION['spieler3'], $_SESSION['spieler4']];
    }

    if(isset($_POST['spieler1']) && isset($_POST['spieler2']) && isset($_POST['spieler3']) && !isset($_POST['spieler4']))
    {
        getPlayerSessionVar(1);
        getPlayerSessionVar(2);
        getPlayerSessionVar(3);
        $_SESSION['array']= [$_SESSION['spieler1'], $_SESSION['spieler2'], $_SESSION['spieler3']];
    }

    if(isset($_POST['spieler1']) && isset($_POST['spieler2']) && !isset($_POST['spieler3']) && !isset($_POST['spieler4']))
    {
        getPlayerSessionVar(1);
        getPlayerSessionVar(2);
        $_SESSION['array']= [$_SESSION['spieler1'], $_SESSION['spieler2']];
    }

    if(isset($_POST['spieler1']) && !isset($_POST['spieler2']) && !isset($_POST['spieler3']) && !isset($_POST['spieler4']))
    {
        getPlayerSessionVar(1);
        $_SESSION['array']= [$_SESSION['spieler1']];
    }

}

function showPlayer(): void
{
// Spielerwechsel
    if (isset($_SESSION['next']))
    {
        $_SESSION['next'] += 0;
    }

    if (isset($_POST['submit']))
    {

        $_SESSION['count']++;
        if (isset($_SESSION['next']) && $_SESSION['next'] < (count($_SESSION['array']) - 1))
        {
            $_SESSION['next']++;
            $_SESSION['activePlayer'] = $_SESSION['array'][$_SESSION['next']];
            echo '<h3>'.$_SESSION['activePlayer'] . '</h3><h4>ist an der Reihe.</h4>';
        }
        else
        {
            $_SESSION['next'] = 0;
            $_SESSION['activePlayer'] = $_SESSION['array'][$_SESSION['next']];
            echo '<h3>'.$_SESSION['activePlayer'] . '</h3><h4>ist an der Reihe.</h4>';
        }
    }
    else{
        $_SESSION['next'] = 0;
        $_SESSION['activePlayer'] = $_SESSION['spieler1'];
        echo '<h3>'.$_SESSION['activePlayer'] . '</h3><h4>ist an der Reihe.</h4>';
    }

}






