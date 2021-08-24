<?php
$subject = $_POST['subject'];
$note = $_POST['note'];
$date = '24 August 2021';

    require 'connect.php';

    $subject = $conn->real_escape_string($subject);
    $note = $conn->real_escape_string($note);
    $date = $conn->real_escape_string($date);

    $sql = "INSERT INTO notes (note_heading, note_text, note_date) VALUES ('$subject', '$note', '$date')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();

?>