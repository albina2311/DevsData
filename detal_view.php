<?php
$notes_id = !empty($_GET['notes_id']) ? $_GET['notes_id'] : 'error';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detal view</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <img src="img/logo.png" alt="" class="logo">
            <div class="setting">
                <img src="img/setting_img.png" alt="" class="setting_img">
                <p class="setting_text">settings</p>
            </div>
        </div>
    </header>

    <div class="container detal_view_container">
        <div class="detal_view">
            <?php 
            require 'connect.php';
            $sql = "SELECT * FROM notes  WHERE notes_id = $notes_id";

            if ($result = $conn->query($sql)) {
                foreach($result as $row) {
                    echo "<h1 class='detal_heading'>" . $row["note_heading"] . "</h1>";
                    echo "<hr>";
                    echo "<div class='detal_content'>";
                        echo "<p class='detal_text'>" . $row["note_text"] . "</p>";
                        echo "<div class='detal_btns'>
                                    <input type='button' value='Edit note' id='edit'>
                                    <input type='button' value='Copy to clipboard' id='copy'>
                                    <input type='button' value='Share' id='share'>
                                </div>";
                    echo "</div>";
                    echo "<p class='note_date'>" . $row["note_date"] . "</p>";
                }

                $result->free();
            } else echo "Ошибка: " . $conn->error;

            echo "</div>";
    ?>
        </div>
    </div>
</body>

</html>