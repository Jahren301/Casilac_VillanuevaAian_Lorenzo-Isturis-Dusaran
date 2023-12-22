<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Event</title>

    <style>
        .txtbox {
            height:30px;
            width:50%;
            font-size:24pt;
        }

        label {
            height:30px;
            width:50%;
            font-size:24pt;
        }

        .btn {
            height:40px;
            width:100px;
            font-size:15pt;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="input-box">
    <label> Event Manager </label> <br><br>
    <form action="" method="post">

        

        <label>Event Name</label><br>
        <input type="text" name="event_name" class="txtbox"> <require_once><br>

        <label>Event Date</label><br>
        <input type="date" name="event_date" class="txtbox"> <require_once><br>

        <label>Location</label><br>
        <input type="text" name="location" class="txtbox"><require_once><br>

        <label>Organizer</label><br>
        <input type="text" name="organizer" class="txtbox"><require_once><br><br>
        <button type="submit" name="submit" class="btn">Save</button>

        <a href="read.php" style="text-decoration:none;">View Records</a>
        </div>
        </div>
    </form>
    <?php

        if(isset($_POST['submit'])){

            $event_name   = $_POST['event_name'];
            $event_date   = $_POST['event_date'];
            $location     = $_POST['location'];
            $organizer    = $_POST['organizer'];
    
            $saving = "INSERT INTO tbl_events (event_name, event_date, location, organizer)
            VALUES ('$event_name', '$event_date', '$location', '$organizer')";
    
            if ($conn->query($saving) === TRUE) {
                echo "Record has been saved!";
                echo '<meta http-equiv="refresh" content="0; url=read.php">';
                
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $conn->close();

        }
        

    ?>


</body>
</html>