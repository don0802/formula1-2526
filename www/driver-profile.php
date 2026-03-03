<?php

require 'database.php';

$driverId = $_GET['id'];
$query = "SELECT * FROM drivers ORDER BY driverId LIMIT 100";
$result = mysqli_query($conn, $query);
$drivers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-6 py-20">
        <h1 class="text-4xl font-bold mb-12 text-center text-red-500">Driver Profile</h1>
        
        <div class="space-y-8">
            <?php foreach ($drivers as $driver): ?>
            <div class="bg-gray-800 rounded-lg p-8 shadow-2xl">
                <h2 class="text-2xl font-bold mb-6 text-white"><?php echo htmlspecialchars($driver['forename'] . ' ' . $driver['surname']); ?></h2>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="text-gray-400 text-xs uppercase">Driver ID</p>
                        <p class="text-white font-semibold text-lg"><?php echo htmlspecialchars($driver['driverId']); ?></p>
                    </div>
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="text-gray-400 text-xs uppercase">Reference</p>
                        <p class="text-white font-semibold text-lg"><?php echo htmlspecialchars($driver['driverRef']); ?></p>
                    </div>
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="text-gray-400 text-xs uppercase">Code</p>
                        <p class="text-white font-semibold text-lg"><?php echo htmlspecialchars($driver['code']); ?></p>
                    </div>
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="text-gray-400 text-xs uppercase">Nationality</p>
                        <p class="text-white font-semibold text-lg"><?php echo htmlspecialchars($driver['nationality']); ?></p>
                    </div>
                    <div class="bg-gray-700 p-4 rounded">
                        <p class="text-gray-400 text-xs uppercase">DOB</p>
                        <p class="text-white font-semibold text-lg"><?php echo htmlspecialchars($driver['dob']); ?></p>
                    </div>
                </div>
                <a href="<?php echo htmlspecialchars($driver['url']); ?>" target="_blank" class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded font-semibold transition mt-2">Visit Profile</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>