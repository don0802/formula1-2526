<?php
$dbhost = 'mariadb';
$dbname = 'Formula1';
$dbuser = 'user';
$dbpass = 'password';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<?php
$query = "SELECT * FROM drivers";
$result = mysqli_query($conn, $query);
$drivers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>