<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testen usw.</title>
    <style>
        .timer{
            border: 5px solid black;
            text-align: center;
            width: 100px;

            font-family: "Verdana", monospace;
            font-size: xx-large;
            padding-top: 30px;
            padding-bottom: 30px;
            border-radius: 60px;

        }
    </style>
    <script>
        var count = 15;
        var interval = setInterval(function(){
            document.getElementById('count').innerHTML=count;
            count--;
            if (count === 0){
                clearInterval(interval);
                document.getElementById('count').innerHTML='--';
                // or...
                //alert("Deine Zeit ist abgelaufen. Leider gibt´s jetzt keine Punkte. Klicke auf Weiter für die nächste Frage.");
            }
        }, 1000);
    </script>
</head>
<body>
<div class="timer" id="count">Los!</div>
<?php
//print_r($_SESSION['testen']);
// Antwortunterscheidung
if(isset($_POST['answer']) && $_SESSION['testen'] == 'nein')
{
    echo 'Antwort Juhee.';
    //$_SESSION['testen'] = 0;
}
elseif(isset($_POST['answer']) && $_SESSION['testen'] != 'nein')
{
    echo 'Zum Glück richtig.<br>Klicke auf Weiter.';
}

//ChoiceA Unterscheidung
if(isset($_POST['choiceA']) && $_SESSION['testen'] == 'nein')
{
    echo 'Nomma A nö.';
    //$_SESSION['testen'] = 'nein';
}
elseif(isset($_POST['choiceA']) && $_SESSION != 'nein')
{
    echo 'A nö.';
    $_SESSION['testen'] = 'nein';
    }

//ChoiceB Unterscheidung
if(isset($_POST['choiceB']) && $_SESSION['testen'] == 'nein')
{
    echo 'Nomma B nö.';
    //$_SESSION['testen'] = 'nein';
}
elseif(isset($_POST['choiceB']) && $_SESSION != 'nein')
{
    echo 'B nö.';
    $_SESSION['testen'] = 'nein';
}

//ChoiceC Unterscheidung
if(isset($_POST['choiceC']) && $_SESSION['testen'] == 'nein')
{
    echo 'Nomma C nö.';
    //$_SESSION['testen'] = 'nein';
}
elseif(isset($_POST['choiceC']) && $_SESSION != 'nein')
{
    echo 'C nö.';
    $_SESSION['testen'] = 'nein';
}

//Submit Weiter
if(isset($_POST['weiter']))
{
    $_SESSION['testen']= 0;
}






if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && isset($_SESSION['spieler3']) && isset($_SESSION['spieler4']))
{
    whichPlayer(4);
}
if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
{
    whichPlayer(3);
}
if(isset($_SESSION['spieler1']) && isset($_SESSION['spieler2']) && !isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
{
    whichPlayer(2);
}
if(isset($_SESSION['spieler1']) && !isset($_SESSION['spieler2']) && !isset($_SESSION['spieler3']) && !isset($_SESSION['spieler4']))
{
    whichPlayer(1);
}
            ?>


    <div class="player">
        <form name="teilnehmer" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
            <br><br><br>
            <h2>Wähle aus, wie viele Teams teilnehmen wollen:</h2>

            <button type="submit" name="answer">Answer</button><br><br>
            <button type="submit" name="choiceA">ChoiceA</button><br><br>
            <button type="submit" name="choiceB">ChoiceB</button><br><br>
            <button type="submit" name="choiceC">ChoiceC</button><br><br>
            <input type="submit" name="weiter" value="Weiter"><br><br>
        </form>
    </div>


</body>
</html>
