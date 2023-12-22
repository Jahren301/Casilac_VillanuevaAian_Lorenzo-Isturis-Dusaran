<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Event Schedule</title>

    <style>
        table, td, th {
        border: 1px solid;
        font-size:24pt;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="wrapper">
<div class="input-box">
    <table>
    
    
        <tr>
        
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Location</th>
            <th>Organizer</th>
            <th>Actions</th>
            
        </tr>
    </div>
        </div>
        
        <?php
            $sql = "SELECT * FROM tbl_events";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                    echo"<tr>";
                        echo"<td>".$row['event_name']."</td>";
                        echo"<td>".$row['event_date']."</td>";
                        echo"<td>".$row['location']."</td>";
                        echo"<td>".$row['organizer']."</td>";
                        echo"<td style='text-align:center;'>
                            <a href='update.php?record_id=".$row['event_id']."'>
                                    <button>Edit</button>
                            </a>
                            <a href='delete.php?record_id=".$row['event_id']."'>
                                <button>Delete</button>
                            </a>
                            </td>";
                    echo"</tr>";
              }
            } else {
                echo"<tr>";
                    echo"<td colspan='4' style='text-align:center;'>No Results</td>";
                echo"</tr>";
            }
            $conn->close();
        ?>
    </table>
    <a href="create.php" style="text-decoration:none;"><h3 style="color:white;">Insert again?</h3></a>

</body>
</html>