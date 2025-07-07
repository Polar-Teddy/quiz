<?php

//Variablen
$title = 'Quiz-Erstellung';
$style = '../css/form.css';
$script = '/js/questionreview.js';

//Includes
require('../functions/functions.php');
require('../database/db.php');
require('../database/indexDB.php');
require('../html/header.php');
?>

    <!-- Auswahl Anzahl Fragen / Anzahl Themen -->
    <form name="quantity" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <?php if (isset($_POST['quantity_button']) && isset($quanTopic)): ?>
            <div class="showTop">
                <h3>Themen-Anzahl:</h3>
                <h2><?= $quanTopic; ?></h2>
            </div>
        <?php else: ?>
            <div class="indexheader">
                <fieldset>
                    <h2>Quiz-Game</h2>
                    <h3>Erstelle dein eigenes Quiz!</h3>
                    <p>Jedes Thema enthält:</p>
                    <p>- 4 Fragen-Sets</p>
                    <p>- Set: Frage, Antwort, 3 Falsch-Antworten</p>
                    <p>- Schwierigkeitsgrade von Einfach - Extrem</p>
                    <br>
                    <h3>Wähle dazu zuerst deine Anzahl an Themen.</h3>
                    <p>Anzahl Themen:
                        <input type="number" id="quan_top" name="quantity_topic" min="1" max="4" pattern="[0-9]"
                               required></p>
                               <div class="general_buttons">
                    <input type="submit" name="quantity_button" value="Speichern">
                    </div><br>
                    <a href="../index.php">Zum Spiel</a>
                </fieldset>
            </div>
        <?php endif; ?>
    </form>
    <br>

    <!-- Anzeige des Formulars der gewählten Optionen -->
    <form name="quiz_form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <?php if (isset($_POST['quantity_button']) && isset($quanTopic)): ?>
            <div class="thema">
                <b>Trage hier deine Themen ein:</b><br><br>
                <i>(!!! Erneutes Speichern überschreibt deine Themen. !!!)</i><br><br>

                <?php for ($h = 0; $h < $quanTopic; $h++): ?>

                <!-- Random-Array-Variablen für Placeholder -->
                <?php $topic = ['z.B. Filme ...', 'z.B. Spiele ...', 'z.B. Internet ...', 'z.B. Unnützes Wissen ...', 'z.B. Serien ...', '...', '...']; ?>

                    <?= '<label for="thema' . $h . '"><b>Thema ' . ($h + 1) . '</b></label><br>'; ?>
                    <?= '<input type="text" id="thema' . $h . '" name="thema[' . $h . ']" placeholder="' . $topic[$h] . '"><br><br>';?>

                <?php endfor; ?>

            </div>

            <?php $pointArray = [50, 100, 250, 500]; ?>

                <?php for ($i = 0; $i < $quanTopic; $i++): ?>
                    <div class="topic">
                        <h2><?='Thema ' . ($i + 1);?></h2>
                        <i>(!!! Erneutes Speichern führt hier zum Hinzufügen neuer Fragen. !!!)</i><br><br>
                        <h2>Staffelung:</h2>
                        <h3>Frage 1 = 50 Punkte (Einfach)</h3>
                        <h3>Frage 2 = 100 Punkte (Mittel)</h3>
                        <h3>Frage 3 = 250 Punkte (Schwer)</h3>
                        <h3>Frage 4 = 500 Punkte (Extrem)</h3>

                        <?php for ($j = 0; $j < 4; $j++): ?>
                            <div class="question_box">
                                <div class="points">
                                    <label for="points"><b>Punkte</b></label><br>
                                    <?= '<input type="text" id="points" name="topic[' . $i . '][' . $j . '][points]" value="' . $pointArray[$j] . '" readonly><br>'; ?>
                                </div>

                                <?php
                                formMaker('question', 'Frage', 'question', $i, $j);
                                formMaker('answer', 'Antwort', 'answer', $i, $j);
                                formMaker('choice', 'AuswahlA', 'choiceA', $i, $j);
                                formMaker('choice', 'AuswahlB', 'choiceB', $i, $j);
                                formMaker('choice', 'AuswahlC', 'choiceC', $i, $j);
                                ?>

                            </div>
                            <br><br>
                        <?php endfor; ?>
                    </div>
            <?php endfor; ?>
            <button type="submit" name="test" >Abschicken</button>
       <?php endif; ?>
    </form>

<?php
$mysqli->close();
require('../html/footer.php');
?>
