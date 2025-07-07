<?php
session_start();

//Variablen
$title= 'Team-Auswahl';
$style= '/css/form.css';
$script = '/js/questionreview.js';

//Beim Drücken auf Neustart
if(isset($_POST['newStart']))
{
    session_destroy();
}

//Includes
require("html/header.php");
?>

<?php if(isset($_POST['teams'])): ?>
    <?php if(is_numeric($_POST['teams']) && $_POST['teams'] >= 1 && $_POST['teams'] < 5): ?>

            <?php $teilnehmer = htmlspecialchars(trim(stripslashes(strip_tags($_POST['teams'])))); ?>
            <div class="player">
                <form name="namen" action="/php/menu.php" method="post">
                    <h2>Tragt hier eure Namen ein:</h2>
                    <?php for($i=1; $i <= $teilnehmer; $i++):?>
                        <h3><?= 'Team ' .$i.':';?></h3>
                        <input type="text" name="<?= 'spieler'.$i;?>" minlength="3" maxlength="11" required >
                        <br>
                    <?php endfor; ?>
                    <br>
                    <input type="submit" name="player" value="Los">
                </form>
            </div>
    <?php else: ?>
        <h2>Fehler: Leider konnte keine zulässige Auswahl ermittelt werden.</h2>
    <?php endif; ?>



<?php else: ?>
    <div class="player">
        <form name="teilnehmer" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <br><br><br>
            <h1>NERDIGES-QUIZ</h1><br>
            <h2>Ein Quiz für nerdige Fans von Filmen und Games!</h2><br>
            <br><h2>Wie viele Teams treten an?</h2><br>
            <div class="teams">
                <?php for($i=1; $i <= 4; $i++): ?>
                    <button type="submit" name="teams" value="<?= $i;?>"><?= $i;?></button>
                <?php endfor;?>
                <br><br>
            </div>
        </form>
    </div>
    <br>
<?php endif;?>

<?php include ("html/footer.php"); ?>
