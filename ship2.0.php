<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mrkocka";

// Kapcsolódás a MySQL szerverhez
$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizze a kapcsolatot
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok megjelenítése</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>A Föderáció három ismert hajója!</h1>
    
        <div id="eredmenySzekcio" class="box-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Űrlap elküldve
                $sql = "SELECT * FROM federationships";
                $result = $conn->query($sql);
                // Eredmények megjelenítése
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="ship-box">';
                        echo '<img src="' . $row["img"] . '" alt="Kép">';
                        echo '<div>' . $row["name"] . '</div>';
                        echo '<div>' . $row["class"] . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Nincs találat az adatbázisban.";
                }
            }
            ?>
        </div>
    <form method="post" action="">
        <input type="submit" name="lekérésGomb" value="Adatok lekérése">
    </form>
</body>
</html>
