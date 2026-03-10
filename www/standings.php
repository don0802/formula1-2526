<?php

require 'database.php';

$sql = "SELECT * FROM driver_standing JOIN drivers ON drivers.driverId = driver_standing.driverId ORDER BY position ASC";
$result = mysqli_query($conn, $sql);
$standings = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Standings</title>
</head>
<body>
    <?php foreach($standings as $standing):?>
        <div>
            <h1>Position: <?php echo $standing['position']; ?></h1>
            <h2><?php echo $standing['forename'] . ' ' . $standing['surname']; ?></h2>
            <p>Points: <?php echo $standing['points']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>