<?php

include('db.php');

$division_select_query =      "SELECT  *
                    FROM    division;";

$division_select_result = mysqli_query($connection, $division_select_query);


while($row = mysqli_fetch_assoc($division_select_result)) {
    print_r($row);
    // print_r($row['   division_text']);
};
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
        <h1>Whole Systems Design PDC Pre Course Packet Answers</h1>
    </header>
    <main>
        <?php
            while($division_row = mysqli_fetch_assoc($division_select_result)) {
                echo "<div class="
            }
    </main> 
</body>
</html>