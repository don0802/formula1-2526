<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <form action="search_process.php" method="GET">
        <label for="zoekterm">Zoek op naam</label>
        <input type="text" name="zoekterm" id="zoekterm" placeholder="Zoek op naam...">

        <div>
            <label for="nationality">Nationaliteit</label>
            <input type="text" name="soort" id="nationality" placeholder="British">
        </div>
        <div>
            <label for="dob">Geboortejaar</label>
            <input type="text" name="soort" id="dob" placeholder="1985">
        </div>
        <div>
            <label for="voornaam">Voornaam</label>
            <input type="radio" name="soort" id="voornaam" value="voornaam">
        </div>
        <div>
            <label for="achternaam">Achternaam</label>
            <input type="radio" name="soort" id="achternaam" value="achternaam">
        </div>
        <select name="soort" id="soort">
            <option value="naam">Sorteer op naam</option>
            <option value="nationaliteit">Sorteer op nationaliteit</option>
            <option value="geboortedatum">Sorteer op geboortedatum</option>
        </select><br>
        <button type="submit">Zoek!</button>
    </form>

</body>

</html>