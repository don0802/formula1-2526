<?php
include 'database.php';

$circuitId = $_GET['id'];
$query = "SELECT * FROM circuits WHERE circuitId = $circuitId";
$result = mysqli_query($conn, $query);
$circuit = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circuit Detail</title>
</head>
<body>
    <h1><?php echo $circuit['name']; ?></h1>
    <p><strong>Location:</strong> <?php echo $circuit['location']; ?></p>
    <p><strong>Country:</strong> <?php echo $circuit['country']; ?></p>
    <p><strong>URL:</strong> <a href="<?php echo $circuit['url']; ?>" target="_blank"><?php echo $circuit['url']; ?></a></p>
    <img src="<?php echo $circuit['image']; ?>" alt="<?php echo $circuit['name']; ?> Image" style="max-width: 20%; height: auto;">
</body>
</html>