<?php require 'database.php'; ?>

<?php
$driverId = $_GET['id'];
$query = "SELECT * FROM drivers WHERE driverId = $driverId";
$result = mysqli_query($conn, $query);
$driver = mysqli_fetch_assoc($result);
?>

<?php
$constructorId = $_GET['id'];
$query = "SELECT * FROM constructors WHERE constructorId = $constructorId";
$result = mysqli_query($conn, $query);
$constructor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams - Formula 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-6 py-20">
        <h1
            class="text-5xl font-bold mb-4 text-center bg-gradient-to-r from-red-500 to-red-400 bg-clip-text text-transparent">
            Formula 1 Teams</h1>
        <p class="text-center text-gray-400 mb-12">Explore all Formula 1 constructor teams</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <?php foreach ($teams as $team): ?>
                <div
                    class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-8 shadow-2xl hover:shadow-red-500/20 transition duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-white mb-2"><?php echo htmlspecialchars($team['name']); ?></h2>
                        <p class="text-sm text-gray-400">ID: <?php echo htmlspecialchars($team['constructorId']); ?></p>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="bg-gray-700 rounded-lg p-3">
                            <p class="text-gray-300 text-sm uppercase tracking-wide">Nationality</p>
                            <p class="text-white font-semibold text-lg">
                                <?php echo htmlspecialchars($team['nationality']); ?>
                            </p>
                        </div>
                    </div>

                    <a href="<?php echo htmlspecialchars($team['url']); ?>" target="_blank"
                        class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 inline-block text-center">Visit
                        Team Website →</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>