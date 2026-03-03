<?php

require 'database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $constructorId = intval($_GET['id']);
    $query = "SELECT * FROM constructors WHERE constructorId = $constructorId";
    $result = mysqli_query($conn, $query);
    $constructor = mysqli_fetch_assoc($result);
} else {
    $constructor = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Profile - Formula 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-900 text-white">
    <?php include 'nav.php'; ?>

    <div class="container mx-auto px-6 py-20">
        <div class="max-w-3xl mx-auto">
            <?php if ($constructor): ?>
                <div class="bg-gray-800 rounded-lg p-8 shadow-2xl">
                    <h1 class="text-4xl font-bold mb-8 bg-gradient-to-r from-red-500 to-red-400 bg-clip-text text-transparent">
                        <?php echo htmlspecialchars($constructor['name']); ?>
                    </h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-700 rounded-lg p-6">
                            <span class="text-gray-300 text-xs uppercase tracking-wider font-semibold">Constructor ID</span>
                            <p class="text-2xl text-red-500 font-bold mt-2"><?php echo htmlspecialchars($constructor['constructorId']); ?></p>
                        </div>
                        
                        <div class="bg-gray-700 rounded-lg p-6">
                            <span class="text-gray-300 text-xs uppercase tracking-wider font-semibold">Reference</span>
                            <p class="text-2xl font-bold mt-2"><?php echo htmlspecialchars($constructor['constructorRef']); ?></p>
                        </div>
                        
                        <div class="bg-gray-700 rounded-lg p-6">
                            <span class="text-gray-300 text-xs uppercase tracking-wider font-semibold">Nationality</span>
                            <p class="text-2xl font-bold mt-2"><?php echo htmlspecialchars($constructor['nationality']); ?></p>
                        </div>
                        
                        <div class="bg-gray-700 rounded-lg p-6">
                            <span class="text-gray-300 text-xs uppercase tracking-wider font-semibold">URL</span>
                            <p class="text-lg mt-2"><a href="<?php echo htmlspecialchars($constructor['url']); ?>" target="_blank" class="text-red-500 hover:text-red-400">Visit Official Website →</a></p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-gray-800 rounded-lg p-12 text-center shadow-2xl">
                    <p class="text-gray-400 text-lg">Team not found. Please select a team from the <a href="teams.php" class="text-red-500 hover:text-red-400">Teams page</a>.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
