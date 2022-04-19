<?php

include('db.php');

$answer_submit_query = "INSERT INTO post    (author, body, question_id)
                        VALUES              ('me',   ";
$answer_submit_query .= $_POST['answer'];
$answer_submit_query .= ', ';
$answer_submit_query .= $_POST['question-num'];
$answer_submit_query .= ');';

$answer_submit_result = mysqli_query($connection, $answer_submit_query);

echo $answer_submit_query;
echo '<br>';
echo $answer_submit_result;