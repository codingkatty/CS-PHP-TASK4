<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_orders";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pancakes = $_POST['pancakes'];
    $cattpacino = $_POST['cattpacino'];
    $waffles = $_POST['waffles'];
    $sauceArray = isset($_POST['sauce']) ? (array) $_POST['sauce'] : [];
    $sauce = implode(", ", $sauceArray);
    $addons = $_POST['addons'];
    $special_requests = $_POST['special_requests'];

    $sql = "INSERT INTO nekocafe (pancakes, cattpacino, waffles, sauce, addons, special_requests)
            VALUES ('$pancakes', '$cattpacino', '$waffles', '$sauce', '$addons', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Order Receipt</title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: "Press Start 2P", serif;
                    padding: 20px;
                    line-height: 2;
                }
                .back-btn {
                    background: none;
                    border: 2px solid black;
                    padding: 10px 20px;
                    font-family: "Press Start 2P", serif;
                    cursor: pointer;
                    margin-top: 20px;
                }
                .receipt {
                    border: 2px solid black;
                    padding: 20px;
                    max-width: 500px;
                    margin: 20px auto;
                }
            </style>
        </head>
        <body>
            <div class="receipt">
                <h2>Order Receipt</h2>
                <div>
                    <?php if($pancakes > 0) echo "Pancakes: $pancakes<br>"; ?>
                    <?php if($cattpacino > 0) echo "Cattpacino: $cattpacino<br>"; ?>
                    <?php if($waffles > 0) echo "Waffles: $waffles<br>"; ?>
                    <?php if(!empty($sauce)) echo "Sauces: $sauce<br>"; ?>
                    <?php if(!empty($addons)) echo "Add-ons: $addons<br>"; ?>
                    <?php if(!empty($special_requests)) echo "Special Requests: $special_requests<br>"; ?>
                </div>
                <button class="back-btn" onclick="window.location.href='index.html'">Return to Menu</button>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>