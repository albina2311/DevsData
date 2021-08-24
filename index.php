<?php include("/opt/index.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevsData</title>
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

    <div class="create_container">
        <div class="create_note">
            <h2 class="create_heading">Create new note</h2>
            <form action="send.php" method="post">
                <div class="create_form">
                    <input type="text" name="" id="" placeholder="Subject">
                    <textarea type="text" name="" id="" placeholder="Note"></textarea>
                    <input type="submit" value="SEND">
                </div>
            </form>

        </div>
    </div>

    <div class="container">
        <div class="notes">
                <?php
                require 'connect.php';
                $sql = "SELECT * FROM notes";
                if($result = $conn->query($sql)){
                    foreach($result as $row){
                        echo "<div class='note_card'>";
                        
                        echo "<a href= 'gallery.php?model=". $row["model"]. "' class = 'link product_link'>"
                                    . $row["model"] . 
                                "</a>";
                        
                            echo "<a href= 'detal_view.php?notes_id=" . $row["notes_id"] . "' class = 'note_heading'>" . $row["note_heading"] . "</a>";
                            echo "<hr>";
                            echo "<p class='note_text'>" . $row["note_text"] . "</p>";
                            echo "<p class='note_date'>" . $row["note_date"] . " </p>";
                            
                            echo "<hr>";
                            echo "<div class='social_networks'>
                                        <img src='img/twitter.png' alt='' class='social_icon'>
                                        <img src='img/facebook.png' alt='' class='social_icon'>
                                        <img src='img/inst.png' alt='' class='social_icon'>
                                    </div>";
                        echo "</div>";
                    }
                    $result->free();
                } else{
                    echo "Ошибка: " . $conn->error;
                }
                ?>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>