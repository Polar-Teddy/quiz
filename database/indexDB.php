<?php
if (isset($_POST['topic'], $_POST['thema']))
{
    // Wenn noch keine Datenbank als auch keine Tabellen existieren:
    $newDatabase = "CREATE DATABASE IF NOT EXISTS quiztest";
    $newTableData = "CREATE TABLE IF NOT EXISTS quiz_data(id INT NOT NULL AUTO_INCREMENT, 
                             categoryNr INT NOT NULL, question VARCHAR(255), answer VARCHAR(255), choice_a VARCHAR(255), 
                             choice_b VARCHAR(255), choice_c VARCHAR(255), UNIQUE INDEX UNIQ_8D93D649F85E0677(question), 
                             PRIMARY KEY(id)) CHARACTER SET utf8 COLLATE utf8_unicode_ci";
    $newTableTopics = "CREATE TABLE IF NOT EXISTS topics(id INT NOT NULL AUTO_INCREMENT, categoryNr INT, 
                           topic VARCHAR(255), PRIMARY KEY(id), UNIQUE INDEX UNIQ_8D93D649F85E0677(categoryNr)) 
                           CHARACTER SET utf8 COLLATE utf8_unicode_ci";
    $newTableHighscore = "CREATE TABLE IF NOT EXISTS highscore(id INT NOT NULL AUTO_INCREMENT, username VARCHAR(50), rightanswer INT, wronganswer INT, countquestion INT, countpercent DOUBLE,
                           PRIMARY KEY(id), UNIQUE INDEX UNIQ_8D93D649F85E0677(username)) 
                           CHARACTER SET utf8 COLLATE utf8_unicode_ci";

    // Feedback über Datenbank-Zugriff
    if (mysqli_query($mysqli, $newDatabase) && mysqli_query($mysqli, $newTableData) && mysqli_query($mysqli, $newTableTopics) && mysqli_query($mysqli, $newTableHighscore))
    {
        echo '<br><br><br>Die Datenbank sowie die Tabellen wurden erfolgreich erstellt oder existieren bereits.<br><br>';
    }
    else
    {
        '<br><br><br>Leider konnten die Datenbank sowie die Tabellen nicht erstellt werden.<br><br>' . mysqli_error($mysqli);
    }

    // Eintragen der übermittelten Daten:

        $topicAll = $_POST['thema'];
        $startArray = $_POST['topic'];

        for ($x = 0 ; $x < sizeof($topicAll); $x++)
        {
            $topicString = "INSERT INTO topics (categoryNr, topic) VALUES ('$x','$topicAll[$x]')
                                ON DUPLICATE KEY UPDATE
                                categoryNr = '$x', topic = '$topicAll[$x]';";
            mysqli_query($mysqli, $topicString);
        }

        foreach ($startArray as $key => $value)
        {
            foreach ($value as $key2 => $value2)
            {
                $points = $value2['points'];
                $question = $value2['question'];
                $answer = $value2['answer'];
                $choiceA = $value2['choiceA'];
                $choiceB = $value2['choiceB'];
                $choiceC = $value2['choiceC'];

                // Wenn Daten neu eingefügt werden müssen:
                $dataString = "INSERT INTO quiz_data (categoryNr,points, question, answer, choice_a, choice_b, choice_c) 
                               VALUES ('$key','$points','$question', '$answer', '$choiceA', '$choiceB', '$choiceC')
                               ON DUPLICATE KEY UPDATE
                               categoryNr = '$key', points = '$points', question = '$question', answer = '$answer', choice_a = '$choiceA',
                               choice_b = '$choiceB', choice_c = '$choiceC';";
                mysqli_query($mysqli, $dataString);
            }
        }
        // Feedback über Speicherung der gesendeten Daten
        if (mysqli_query($mysqli, $topicString) && mysqli_query($mysqli, $dataString))
        {
            echo 'Die Daten wurden erfolgreich gespeichert.<br><br><br>';
        }
        else
        {
            'Leider konnten die Daten nicht gespeichert werden.<br><br><br>' . mysqli_error($mysqli);
        }
        echo '<hr><br><br>';

    }

