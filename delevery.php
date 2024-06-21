<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sample Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a class="nav-link" href="/offer.php">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/delivery.php">Delivery charge rules</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Delivery Costs</h2>
        <p class="text-center">To incentivize you to spend more, we offer reduced delivery costs based on your order amount:</p>
        
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-bag-fill"></i> Orders under $50</h5>
                        <p class="card-text">Delivery costs <strong>$4.95</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-bag-fill"></i> Orders between $50 and $89.99</h5>
                        <p class="card-text">Delivery costs <strong>$2.95</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <h5 class="card-title"><i class="bi bi-bag-fill"></i> Orders of $90 or more</h5>
                        <p class="card-text"><strong>Free delivery!</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzWqKnwoQ+adnU1/rFtU8xKz7vAXoXf0I6PajN9+Q9Kf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-p5cgZ4drg+1aoGxB7ZpJdEpgtjMEqFtwK3mDAk5F5Wus76Bb7J9qYWE0z6E6A4cd" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
