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

// Fetch products from database
$sql_product = "SELECT * FROM products";
$product_result = $connection->query($sql_product);

if (!$product_result) {
    die("Invalid query: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .box {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .box:hover {
            background-color: #2980b9;
            transform: scale(1.1);
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
                        <a class="nav-link active" aria-current="page" href="/main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/offer.php">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/delevery.php">Delivery charge rules</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center mt-4">
        <h2>Products</h2>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="height: 60vh;">
        <div class="row">
            <?php
            // Loop through each product fetched from database
            while ($row = $product_result->fetch_assoc()) {
                echo '<div class="col-12 col-md-4 d-flex justify-content-center">';
                echo '<div class="box border border-light rounded p-3 m-3 shadow" style="height: 20vh; width: 20vh;">';
                echo '<b>Name :</b>' . $row['product_name']; // Display the product name (adjust for your database schema)
                echo '<br>';
                echo '<b>Code :</b>' . $row['product_code'];
                echo '<br>';
                echo '<b>Price :</b>' . $row['Price'];
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="row">
            <div class="container d-flex justify-content-center">
                <button id="addButton" type="button" class="btn btn-success m-3">Add</button>
                <button id="totalButton" type="button" class="btn btn-primary m-3">Total</button>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal" style="display:none; justify-content: center; align-items: center;">
        <!-- Modal content -->
        <div class="modal-content d-flex justify-content-center align-items-center" style="height: 50vh; width: 50vh;">
            <h2>Add Item</h2>
            <form action="order.php" method="post">
                <div class="container">
                    <input type="text" id="code" name="code" placeholder="Enter item code" class="row border border-dark rounded p-2 mt-2" required>
                    <input type="number" id="quantity" name="quantity" placeholder="Enter item quantity" class="row border border-dark rounded p-2 mt-2" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button id="submitBtn" type="submit" class="btn btn-primary m-3">Submit</button>
                    <button type="button" class="close btn btn-danger m-3">Hide</button>
                </div>
            </form>
        </div>
    </div>

    <div id="totalModal" class="modal" style="display:none; justify-content: center; align-items: center;">
        <!-- Modal content -->
        <div class="modal-content d-flex justify-content-center align-items-center" style="height: 50vh; width: 50vh;">
            <h2>Total Cost</h2>
            <div id="totalAmount" class="container"></div>
            <div class="d-flex justify-content-center">
                <button type="button" class="close btn btn-danger m-3">Close</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qFq5XBy46XJbnTB5YjQmGAaEyKNUqgGV0tvMEi2x5WWMtvK1ctv59GL9b9byEFyc" crossorigin="anonymous"></script>
    <script>
        let productsInCart = [];

        // Show Add Item Modal
        var modal = document.getElementById('myModal');
        var addButton = document.getElementById("addButton");
        addButton.onclick = function() {
            modal.style.display = "flex";
        }

        // Hide Modals
        var spans = document.getElementsByClassName("close");
        for (let span of spans) {
            span.onclick = function() {
                span.closest('.modal').style.display = "none";
            }
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == totalModal) {
                totalModal.style.display = "none";
            }
        }


        // Show total cost
        var totalModal = document.getElementById('totalModal');
        var totalButton = document.getElementById("totalButton");
        totalButton.onclick = function() {
            fetch('total.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(productsInCart),
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('totalAmount').innerText = 'Total: $' + data.total.toFixed(2);
                    totalModal.style.display = "flex";
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>

<?php
// Close connection after use
$connection->close();
?>
