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


$sql = "SELECT * FROM federationships";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<h1>A Föderáció három ismert hajója!</h1>
<section class="box-container">
<?php
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
    $conn->close();
    ?>
</section>
</body>
</html>