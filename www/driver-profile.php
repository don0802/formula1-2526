<?php

require 'database.php';

$query = "SELECT * FROM drivers WHERE driverId = 1";
$result = mysqli_query($conn, $query);
$driver = mysqli_fetch_assoc($result);
?>

<?php
var_dump($driver);
?>