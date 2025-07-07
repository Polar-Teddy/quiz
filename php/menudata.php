<?php
// Zähl-Variable für Anzahl von Einträgen in der Datenbank
$idString = "SELECT id FROM quiz_data ";
$idQuery = mysqli_query($mysqli, $idString);
$countID = mysqli_num_rows($idQuery);

// Zähl-Variable für Anzahl von Themenauswahl-Boxen
$countString = "SELECT topic FROM topics";
$countQuery = mysqli_query($mysqli, $countString);
$count = mysqli_num_rows($countQuery);


function showPlayerHighscore($number)
{
    echo' <div class="menuPlayerHighscore">';
        if (isset($_SESSION['spieler'.$number], $_SESSION['points'.$number]))
            {
                echo '<h3>'.$_SESSION['spieler'.$number].'</h3>
                      <h2>'.$_SESSION['points'.$number].'</h2>';
            }
        else
            {
                echo '<h3>Spieler '.$number.'</h3>';
            }
    echo '</div>';
}

function playerEntry($number)
{
    echo '
        <tr>
            <td>'.$_SESSION['spieler'.$number].'</td>
            <td>'.$_SESSION['right'.$number].'</td>
            <td>'.$_SESSION['wrong'.$number].'</td>
            <td>'.$_SESSION['points'.$number].'</td>
        </tr>';
}
