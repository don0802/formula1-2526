<?php

session_start();

//validatie
if (isset($_GET['zoekterm']) && !empty($_GET['zoekterm'])) {
    $zoekterm = trim($_GET['zoekterm']); // Verwijder spaties aan begin/einde

    // Minimum lengte check
    if (strlen($zoekterm) < 2) {
        echo "Voer minimaal 2 karakters in";
        exit;
    }

    // Sla zoekterm op in sessie
    if(!isset($_SESSION['zoekgeschiedenis'])){
        $_SESSION['zoekgeschiedenis'] = [];
    }

    if(!in_array($zoekterm, $_SESSION['zoekgeschiedenis'])){
        array_unshift($_SESSION['zoekgeschiedenis'], $zoekterm);
        $_SESSION['zoekgeschiedenis'] = array_slice($_SESSION['zoekgeschiedenis'], 0, 5);
    }

    // Toon zoekgeschiedenis
    if(!empty($_SESSION['zoekgeschiedenis'])){
        echo "<p>Recente zoekopdrachten: ";
        foreach($_SESSION['zoekgeschiedenis'] as $historie){
            echo "<a href='?zoekterm=$historie'>$historie</a> ";
        }
        echo "</p>";
    }

    // Standaard sortering
    $orderBy = 'ORDER BY surname ASC, forename ASC';

    if (isset($_GET['soort'])) {
        $soort = $_GET['soort'];

        switch ($soort) {
            case 'naam':
                $orderBy = 'ORDER BY surname ASC, forename ASC';
                break;
            case 'nationaliteit':
                $orderBy = 'ORDER BY nationality ASC';
                break;
            case 'geboortedatum':
                $orderBy = 'ORDER BY dob ASC';
                break;
        }
    }

    require 'database.php';

        // Zoek in meerdere velden
        $sql = "SELECT * 
        FROM drivers
        WHERE forename LIKE '%$zoekterm%' 
        OR surname LIKE '%$zoekterm%'
        OR nationality LIKE '%$zoekterm%'
        OR YEAR(dob) LIKE '%$zoekterm%'"
            . $orderBy;

        $result = mysqli_query($conn, $sql);
        $drivers = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Toon aantal resultaten
        $aantal = count($drivers);
        echo "<p>Aantal gevonden resultaten: $aantal</p>";


        function highlight($text, $zoekterm)
        {
            return str_ireplace($zoekterm, "<mark>$zoekterm</mark>", $text);
        }

        // if ($aantal > 0) {
        //     foreach ($drivers as $driver) {
        //         $forename = highlight($driver['forename'], $zoekterm);
        //         $surname = highlight($driver['surname'], $zoekterm);
        //         echo $forename . " " . $surname . "<br>" . $driver['nationality'] . "<br>" . $driver['dob'] . "<br>" . "<br>";
        //     }
        // } else {
        //     echo "<p>Geen resultaten gevonden voor: " . $zoekterm . "</p>";
        // }
        if ($aantal > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Voornaam</th><th>Achternaam</th><th>Nationaliteit</th><th>Geboortedatum</th></tr>";
            foreach ($drivers as $driver) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($driver['forename']) . "</td>";
                echo "<td>" . htmlspecialchars($driver['surname']) . "</td>";
                echo "<td>" . htmlspecialchars($driver['nationality']) . "</td>";
                echo "<td>" . htmlspecialchars($driver['dob']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

    } else {
        echo "Voer een zoekterm in";
        exit;
    }
?>