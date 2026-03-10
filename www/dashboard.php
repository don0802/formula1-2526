<?php


require 'database.php';

$sql1 = "SELECT COUNT(*) AS number_of_drivers FROM drivers";
$result1 = mysqli_query($conn, $sql1);
$count = mysqli_fetch_assoc($result1);
echo "Het aantal drivers is " . $count['number_of_drivers'] . "<br>";

$sql2 = "SELECT COUNT(*) AS number_of_drivers FROM drivers WHERE nationality = 'German'";
$result2 = mysqli_query($conn, $sql2);
$count_germany = mysqli_fetch_assoc($result2);
echo "Het aantal Duitse drivers is " . $count_germany['number_of_drivers'] . "<br>";


$sql3 = "SELECT MIN(cs.position) as highest_position FROM constructor_standing cs
                    JOIN constructors c ON c.constructorId = cs.constructorId
                    WHERE c.name = 'RENAULT'";
$result3 = mysqli_query($conn, $sql3);
$standings = mysqli_fetch_assoc($result3);
echo "De hoogste positie van Renault is " . $standings['highest_position'] . "<br>"; 
?>