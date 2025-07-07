<?php
session_start();

//Variablen
$title = 'Quizfrage';
$style = '../css/quizgame.css';
$script = '../js/timer.js';

//Includes
require('../functions/functions.php');
require('../database/db.php');
require('counter.php');
require('counterPlayer.php');
require('newdata.php');
require('../html/header.php');
?>

<!-- Quiz-Formular als Frage-Antwort-Spiel -->
<form name="questions" action="<?= '?points=' . $points . '&category=' . $category . '&difficult=' . $difficulty; ?>"
      method="post">
    <div class="quiztitle">
        <div class="menuPlayerHighscore">
            <h4>Punkte:</h4>
            <h3><?= $points; ?></h3>
        </div>
        <div class="menuPlayerHighscore">
            <h4>Schwierigkeit:</h4>
            <h3><?= $difficulty; ?></h3>
        </div>
        <?php if (isset($_POST['answer'])): ?>
            <div class="timer">X</div>
        <?php elseif (isset($_POST['choiceA']) && $_SESSION['wrongAnswer'] == 'wrongAnswer'): ?>
            <div class="timerWrong">X</div>
        <?php elseif (isset($_POST['choiceB']) && $_SESSION['wrongAnswer'] == 'wrongAnswer'): ?>
            <div class="timerWrong">X</div>
        <?php elseif (isset($_POST['choiceC']) && $_SESSION['wrongAnswer'] == 'wrongAnswer'): ?>
            <div class="timerWrong">X</div>
        <?php else: ?>
            <div class="timer" id="count">Los!</div>
        <?php endif; ?>
    </div>
    <?php if(isset($_POST['frage'])): ?>
    <div class="infoAnswer">
        <h4>Wähle deine Antwort!</h4>
    </div>
    <?php endif; ?>
    <div class="infoAnswer">
        <?php functionPlayer(); ?>
    </div>
    <br><br><br><br><br>
    <div class="quizquestionbox" id="questionbox">
        <div class="quizquestion">
            <h1><?php echo $question; ?></h1>
        </div>
        <br>
        <div class="quizbuttons">
            <?php
            $inputArray = getInputArray($answer, $choiceA, $choiceB, $choiceC);
            ?>
        </div>
</form>
</div>

<div id="submitFeedback"></div>
<div class="quizquestionbox">
    <form name="submit" action="menu.php" method="post">
        <div class="general_buttons">
        <input type="submit" name="submit" value="Weiter">
        </div>
    </form>
</div>


<?php require('../html/footer.php'); ?>
