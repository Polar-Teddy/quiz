<?php
session_start();

//Variablen
$title= 'Highscore';
$style= '../css/quizgame.css';
$script = '../js/questionreview.js';

//Includes
require('../database/db.php');
require('counter.php');
require('highscoredata.php');
require('../html/header.php')
?>

<?php if (isset($_POST['speichern'])): ?>
    <div class="feedback">

        <?php if (mysqli_num_rows($feedbackResult) > 0): ?>
            <h2>Highscore</h2>
                <table id="feedback">
                    <tr>
                      <th>Name</th>
                      <th>Richtig / Falsch</th>
                      <th>Punkte</th>
                    </tr>

                    <?php while ($rows = mysqli_fetch_assoc($feedbackResult)): ?>
                        <tr>
                            <td><?php echo $rows['username']; ?></td>
                            <td><?php echo $rows['rightanswer'] . ' / ' . $rows['wronganswer']; ?></td>
                            <td><?php echo $rows['countquestion']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
        <?php else: ?>
            Keine Daten vorhanden
        <?php endif; ?>
        <?php session_destroy(); $feedbackResult->free_result(); ?>
        <br><br>
            <a href="../index.php">Zum Spiel</a>
    </div>
<?php endif; ?>

<?php require('../html/footer.php');
