<?php

include('db.php');

$division_select_query =      "SELECT  *
                    FROM    division;";

$division_select_result = mysqli_query($connection, $division_select_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whole Systems Design Answer Forum</title>
</head>
<body>
    <header>
        <h1>Whole Systems Design PDC Pre Course Packet Answers 2022</h1>
    </header>
    <main>
        <?php
            while($division_row = mysqli_fetch_assoc($division_select_result)) {
                printf("<section class='divisions'><h2>%s</h2>", $division_row['division_text']);

                $question_select_query =    "SELECT *
                            FROM questions
                            WHERE division = ";
                $question_select_query .= $division_row['id'];
                $question_select_query .= `} ;`;
                $question_select_result = mysqli_query($connection, $question_select_query);

                while($question_row = mysqli_fetch_assoc($question_select_result)){

                    printf("<div class='question'><h3>%s</h3>", $question_row['question']);

                    $answer_select_query =  "SELECT *
                                            FROM post
                                            WHERE question_id = ";
                    $answer_select_query .= $question_row['id'];
                    $answer_select_query .= " ORDER BY post_date DESC;";
                    $answer_select_result = mysqli_query($connection, $answer_select_query);
                    if(mysqli_num_rows($answer_select_result)){
                        while($answer_row = mysqli_fetch_assoc($answer_select_result)){
                            printf("<div class='answer'>
                                        <p class='author'>
                                         %s
                                        </p>
                                    
                                        <p class='post_date'>
                                          %s
                                        </p>
                                    
                                        <p class='answer'>
                                         %s
                                        </p>
                                    </div>", $answer_row['author'], $answer_row['post_date'], $answer_row['body']);
                        }
                    } else {
                        printf("<p>no answers yet</p>");
                    }

                    printf("</div>");

                    printf("
                        <form id='question-%d' action='answer-submission.php' method='post'>
                            <label for='answer'>Your answer:</label>
                            <input type='text' id='answer' name='answer'>
                            <input type='text' id='question-num' name='question-num' value='%d' hidden>
                            <input type='submit'>
                        </form>
                    ", $question_row['id'], $question_row['id'], $question_row['id'], $question_row['id'], $question_row['id'], $question_row['id'],$question_row['id']);
                
                }
                printf("</section>");
            }
        ?>
    </main> 
</body>
</html>