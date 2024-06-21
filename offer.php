<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cart";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch offers from database
$sql_offers = "SELECT * FROM offers";
$offer_result = $connection->query($sql_offers);

if (!$offer_result) {
    die("Invalid query: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Offers Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .offer-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .offer-card:hover {
            background-color: #f1f1f1;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/offer.php">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/delevery.php">Delivery charge rules</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Current Offers</h2>
        <div class="row justify-content-center">
            <?php
            // Loop through each offer fetched from the database
            while ($row = $offer_result->fetch_assoc()) {
                echo '<div class="col-12 col-md-4 d-flex justify-content-center mb-4">';
                echo '<div class="card offer-card border-primary shadow" style="width: 18rem;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['description'] . '</h5>';
                echo '<p class="card-text"><b>Product Code:</b> ' . $row['product_code'] . '</p>';
                echo '<p class="card-text"><b>Buy Quantity:</b> ' . $row['buy_quantity'] . '</p>';
                echo '<p class="card-text"><b>Get Quantity:</b> ' . $row['get_quantity'] . '</p>';
                echo '<p class="card-text"><b>Discount:</b> ' . $row['discount_percentage'] . '%</p>';
                echo '<p class="card-text"><b>Valid From:</b> ' . $row['start_date'] . '</p>';
                echo '<p class="card-text"><b>Valid Until:</b> ' . $row['end_date'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qFq5XBy46XJbnTB5YjQmGAaEyKNUqgGV0tvMEi2x5WWMtvK1ctv59GL9b9byEFyc" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close connection after use
$connection->close();
?>
