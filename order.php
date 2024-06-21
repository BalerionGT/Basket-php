<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cart";

// Create a connection
$connection = new mysqli($servername,$username,$password,$database);
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $order_id = 1;
    $product_code  = $_POST["code"];
    $quantity = $_POST["quantity"];
    
    $check_stmt = $connection->prepare("SELECT * FROM order_products WHERE product_code = ?");
        $check_stmt->bind_param("s", $product_code);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Product exists, update the quantity
        $update_stmt = $connection->prepare("UPDATE order_products SET quantity = quantity + ? WHERE product_code = ?");
        $update_stmt->bind_param("is", $quantity, $product_code);
        
        if ($update_stmt->execute()) {
            echo "Quantity updated successfully";
        } else {
            echo "Error updating quantity: " . $update_stmt->error;
        }
        
        $update_stmt->close();
    } else {
        // Product does not exist, insert new row
        $insert_stmt = $connection->prepare("INSERT INTO order_products (order_id, product_code, quantity) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("isi", $order_id, $product_code, $quantity);
        
        if ($insert_stmt->execute()) {
            echo "New order added successfully";
        } else {
            echo "Error adding new order: " . $insert_stmt->error;
        }
        
        $insert_stmt->close();
    }
    
    // Close the check statement and connection
    $check_stmt->close();
    $connection->close();
}
?>