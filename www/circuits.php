<?php
include 'database.php';

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $value = $_GET['value'];
    $query = "SELECT * FROM circuits WHERE $filter = '$value'";
} else {
    $query = "SELECT * FROM circuits";
}

$result = mysqli_query($conn, $query);
$circuits = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Circuits</title>
</head>

<body>

    <div class="max-w-4xl mx-auto mb-8 bg-gray-800 rounded-xl p-6 shadow-xl" data-aos="fade-up">
        <h3 class="text-xl font-bold mb-4 text-red-500">Filter by Country</h3>
        <div class="flex flex-wrap gap-3">
            <a href="circuits.php"
                class="px-4 py-2 bg-gray-700 hover:bg-red-600 rounded-lg font-semibold transition duration-200">All
                Circuits</a>
            <a href="circuits.php?filter=country&value=Netherlands"
                class="px-4 py-2 bg-gray-700 hover:bg-red-600 rounded-lg font-semibold transition duration-200">Netherlands</a>
        </div>
    </div>
    <?php foreach ($circuits as $circuit): ?>
        <a href="circuit-detail.php?id=<?php echo $circuit['circuitId'] ?>"
            class="circuit"><?php echo $circuit['name']; ?></a><br>
    <?php endforeach; ?>
</body>

</html>