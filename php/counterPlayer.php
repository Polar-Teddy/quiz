<?php

//Submit Weiter
if(isset($_POST['frage']))
{
    $_SESSION['wrongAnswer']= 0;
}


function choices($letter, $number, $nextPlayerNumber)
{
    if(isset($_POST['choice'.$letter]) && $_SESSION['wrongAnswer'] == 'cheater')
    {
        $_SESSION['points'.$number] = $_SESSION['points'.$number] - $_SESSION['points'];
        echo '<h3>Zu spät & geschummelt.</h3><h4>Dir werden die Anzahl der Punkte nun zur Strafe abgezogen.</h4>';
    }
    elseif(isset($_POST['choice'.$letter]) && $_SESSION['wrongAnswer'] == 'wrongAnswer')
    {
        echo '<h3>Chance vertan, leider auch falsch.</h3><h4>Klicke auf Weiter für die nächste Frage.</h4>';
        echo '<style>.answer input {background-color: green !important; color:white !important;}</style>';
        $_SESSION['wrongAnswer'] = 'cheater';
    }
    elseif(isset($_POST['choice'.$letter]) && $_SESSION['wrongAnswer'] != 'wrongAnswer')
    {
        $_SESSION['wrongAnswer'] = 'wrongAnswer';
        $_SESSION['wrong'.$number]++;
        $_SESSION['activePlayer'] = $_SESSION['spieler'.$nextPlayerNumber];
        echo '<h4>Leider falsch.</h4><h3> '.$_SESSION['spieler'.$nextPlayerNumber].' kann es noch einmal versuchen.</h3>';

    }
}

function choicesPlayerOne($letter, $number)
{
    if(isset($_POST['choice'.$letter]) && $_SESSION['wrongAnswer'] == 'wrongAnswer')
    {
        $_SESSION['points'.$number] = $_SESSION['points'.$number] - $_SESSION['points'];
        echo '<h3>Du hast geschummelt.</h3><h4>Dir werden die Anzahl der Punkte nun zur Strafe abgezogen.</h4>';
    }

    elseif(isset($_POST['choice'.$letter]) && $_SESSION['wrongAnswer'] != 'wrongAnswer')
    {
        $_SESSION['wrong'.$number]++;
        $_SESSION['wrongAnswer'] = 'wrongAnswer';
        echo '<h4>Leider falsch.</h4><h3>Klicke auf Weiter für die nächste Frage.</h3>';
        echo '<style>.answer input {background-color: green !important; color:white !important;}</style>';
    }
}

function answerChoices($number){

    if(isset($_POST['answer']) && $_SESSION['wrongAnswer'] == 'cheater')
    {
        $_SESSION['points'.$number] = $_SESSION['points'.$number] - $_SESSION['points'];
        echo '<h3>Zu spät & geschummelt.</h3><h4>Dir werden die Anzahl der Punkte nun zur Strafe abgezogen.</h4>';
    }
    elseif(isset($_POST['answer']) && $_SESSION['wrongAnswer'] == 'wrongAnswer')
    {
        $_SESSION['right'.$number]++;
        $_SESSION['points'.$number] = $_SESSION['points'.$number] + $_SESSION['points'];
        $_SESSION['wrongAnswer'] = 'cheater';

        echo '<h3>Prima, die Antwort ist richtig.</h3> <h4>Klicke auf Weiter für die nächste Frage.</h4>';
    }
    elseif(isset($_POST['answer']) && $_SESSION['wrongAnswer'] != 'wrongAnswer')
    {
        $_SESSION['right'.$number]++;
        $_SESSION['points'.$number] = $_SESSION['points'.$number] + $_SESSION['points'];

        echo '<h3>Richtig.</h3> <h4>bitte klick auf Weiter für die nächste Frage.</h4>';
    }
}

// 4 Spieler
function player4(): void
{
    if (isset($_SESSION['spieler1'], $_SESSION['spieler2'], $_SESSION['spieler3'], $_SESSION['spieler4']))
    {
        if ($_SESSION['activePlayer'] == $_SESSION['spieler1'])
        {
            answerChoices(1);
            choices("A", 1, 2);
            choices("B", 1, 2);
            choices("C", 1, 2);

        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler2'])
        {
            answerChoices(2);
            choices("A", 2, 3);
            choices("B", 2, 3);
            choices("C", 2, 3);

        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler3'])
        {
            answerChoices(3);
            choices("A", 3, 4);
            choices("B", 3, 4);
            choices("C", 3, 4);

        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler4'])
        {
            answerChoices(4);
            choices("A", 4, 1);
            choices("B", 4, 1);
            choices("C", 4, 1);

        }
    }
}


// 3 Spieler
function player3(): void
{
    if (isset($_SESSION['spieler1'], $_SESSION['spieler2'], $_SESSION['spieler3']))
    {
        if ($_SESSION['activePlayer'] == $_SESSION['spieler1'])
        {
            answerChoices(1);
            choices("A", 1, 2);
            choices("B", 1, 2);
            choices("C", 1, 2);

        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler2'])
        {
            answerChoices(2);
            choices("A", 2, 3);
            choices("B", 2, 3);
            choices("C", 2, 3);

        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler3'])
        {
            answerChoices(3);
            choices("A", 3, 1);
            choices("B", 3, 1);
            choices("C", 3, 1);

        }
    }
}


// 2 Spieler

function player2(): void
{
    if (isset($_SESSION['spieler1'], $_SESSION['spieler2']))
    {
        if ($_SESSION['activePlayer'] == $_SESSION['spieler1'])
        {
            answerChoices(1);
            choices("A", 1, 2);
            choices("B", 1, 2);
            choices("C", 1, 2);
        }
        elseif ($_SESSION['activePlayer'] == $_SESSION['spieler2'])
        {
            answerChoices(2);
            choices("A", 2, 1);
            choices("B", 2, 1);
            choices("C", 2, 1);
        }
    }

}





// 1 Spieler
function player1(): void
{
    if (isset($_SESSION['spieler1']))
    {
        if ($_SESSION['activePlayer'] == $_SESSION['spieler1'])
        {
            // Antwortunterscheidung
            if(isset($_POST['answer']) && $_SESSION['wrongAnswer'] == 'cheater')
            {
                $_SESSION['points1'] = $_SESSION['points1'] - $_SESSION['points'];
                echo '<h3>Du hast geschummelt.</h3><h4>Dir werden die Anzahl der Punkte nun zur Strafe abgezogen.</h4>';
            }
            elseif(isset($_POST['answer']) && $_SESSION['wrongAnswer'] != 'wrongAnswer')
            {
                $_SESSION['right1']++;
                $_SESSION['points1'] = $_SESSION['points1'] + $_SESSION['points'];

                echo '<h3>Richtig.</h3><h4>bitte klick auf Weiter für die nächste Frage.</h4>';
            }

            choicesPlayerOne("A", 1);
            choicesPlayerOne("B", 1);
            choicesPlayerOne("C", 1);

        }
    }
}


