<?php
require_once "db.php";

$record_id = $_GET['record_id'];

$sql = "SELECT * FROM tbl_events WHERE event_id = '$record_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create</title>

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
    <form action="" method="post">

        <a href="read.php" style="text-decoration:none;"><h1 style="color:white;">View Records</h1></a>

        <label>Event Name</label><br>
        <input type="text" name="event_name" value="<?php echo $row['event_name'] ?>" class="txtbox"><br>

        <label>Event Date</label><br>
        <input type="date" name="event_date" value="<?php echo $row['event_date'] ?>" class="txtbox"><br>

        <label>Location</label><br>
        <input type="text" name="location" value="<?php echo $row['location'] ?>" class="txtbox"><br>

        <label>Organizer</label><br>
        <input type="text" name="organizer" value="<?php echo $row['organizer'] ?>" class="txtbox"><br><br>
        <input type="submit" name="submit" value="Update" class="btn">

        

    </form>
    </div>
    </div>
    <?php

        if(isset($_POST['submit'])){

            $record_id  = $_GET['record_id'];
            $event_name   = $_POST['event_name'];
            $event_date   = $_POST['event_date'];
            $location     = $_POST['location'];
            $organizer    = $_POST['organizer'];
    
            $update = "UPDATE tbl_events SET 
            event_name    = '$event_name',
            event_date    = '$event_date',
            location      = '$location',
            organizer     = '$organizer'
            WHERE event_id = '$record_id';
            ";
    
            if ($conn->query($update) === TRUE) {
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