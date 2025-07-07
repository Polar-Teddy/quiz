<?php
session_start();

//Variablen
$title = 'Spielauswahl';
$style = '../css/quizgame.css';
$script = '../js/questionreview.js';

//Includes
require('../html/header.php');
require('../functions/functions.php');
require('../database/db.php');
require('counter.php');
require('menudata.php');
?>



<?php if ($_SESSION['count'] < $countID-1 ):?>
    <div class="pagetitle">
        <h1>Wähle eine Frage aus:</h1>
    </div>
    
    <div class="menutitle">

        <!-- Spieler 1 -->
        <?php showPlayerHighscore(1); ?>

        <!-- Spieler 2 -->
        <?php showPlayerHighscore(2); ?>

        <!-- Legende -->
        <div class="menuPlayerMiddle">
            <?php showPlayer(); ?>
        </div>

        <!-- Spieler 3 -->
        <?php showPlayerHighscore(3); ?>

        <!-- Spieler 4 -->
        <?php showPlayerHighscore(4); ?>
    </div>
    <br><br><br><br><br><br>

    <form action="new.php" method="post">
        <div class="choicebox">

            <?php for ($i = 0; $i < $count; $i++): ?>

                <?php
                //Abrufen der Daten aus DB für die Themen-Titel
                $selectString = "SELECT topic FROM topics WHERE categoryNr = '$i'";
                $result = mysqli_query($mysqli, $selectString);
                ?>

                <!-- Auswahl Box generieren mit Thema und dazugehörigen Fragen -->
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $row = mysqli_fetch_array($result); ?>
                    <div class="gamebox">
                        <h2><?= $row['topic'];?></h2>
                        <ul>
                            <?php if (isset($_POST['frage'], $_POST['submit'])): ?>
                                <style>.frage button {background-color: green !important; color:white !important;}</style>
                            <?php endif; ?>

                                 <div class="frage">
                                     <?php
                                     questionPoints(50, $i, 'Einfach');
                                     questionPoints(100, $i, 'Mittel');
                                     questionPoints(250, $i, 'Schwer');
                                     questionPoints(500, $i, 'Extrem');
                                     ?>
                                </div>
                        </ul>
                    </div>
                <?php else: ?>
                    Es konnte kein Eintrag gefunden werden.
                <?php endif; ?>
            <?php endfor;?>
        </div>
    </form>

<?php else: ?>
    <div class="feedback">
        <h2>Auswertung</h2>
        <table id="feedback">
            <tr>
                <th><b>Spieler</b></th>
                <th><b>Richtig</b></th>
                <th><b>Falsch</b></th>
                <th><b>Punkte</b></th>
            </tr>

            <?php
                playerEntry(1);

                if (isset($_SESSION['spieler2']))
                    {
                        playerEntry(2);
                    }
                if (isset($_SESSION['spieler3']))
                    {
                        playerEntry(3);
                    }

                if (isset($_SESSION['spieler4']))
                    {
                        playerEntry(4);
                    }
                ?>
        </table>
        <br><br>
        <form name="highscore" action="../index.php" method="post">
            <div class="general_buttons">
            <input type="submit" name="newStart" value="Neu starten">
            </div>
        </form>

        <div class="highscore_safe">
        <h2>Möchtest du dein Spiel speichern?</h2>
        </div>
        <form name="highscore" action="highscore.php" method="post">
            <div class="general_buttons">
            <input type="submit" name="speichern" value="Speichern">
            </div>
        </form>

    </div>
<?php endif; ?>

<?php require('../html/footer.php'); ?>
