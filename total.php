<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$database = "cart";

// Create a connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $connection->connect_error]));
}

// Fetch order products
$sql_order_products = "SELECT * FROM order_products";
$order_products_result = $connection->query($sql_order_products);
if (!$order_products_result) {
    die(json_encode(["error" => "Invalid query: " . $connection->error]));
}

$cartItems = [];
while ($row = $order_products_result->fetch_assoc()) {
    $cartItems[] = $row;
}

// Fetch product prices
$sql_products = "SELECT * FROM products";
$product_result = $connection->query($sql_products);
if (!$product_result) {
    die(json_encode(["error" => "Invalid query: " . $connection->error]));
}

$productPrices = [];
while ($row = $product_result->fetch_assoc()) {
    $productPrices[$row['product_code']] = $row['Price'];
}

// Fetch offers
$sql_offers = "SELECT * FROM offers";
$offers_result = $connection->query($sql_offers);
if (!$offers_result) {
    die(json_encode(["error" => "Invalid query: " . $connection->error]));
}

$offers = [];
while ($row = $offers_result->fetch_assoc()) {
    $offers[] = $row;
}

// Calculate total cost
$total = 0;

foreach ($cartItems as $item) {
    $product_code = $item['product_code'];
    $quantity = $item['quantity'];

    if (isset($productPrices[$product_code])) {
        $price = $productPrices[$product_code];
        $total += $price * $quantity;

        // Apply offers
        foreach ($offers as $offer) {
            if ($offer['product_code'] == $product_code && $quantity > $offer['buy_quantity']) {
                $numOffers = floor($quantity/2);
                $total -= $numOffers*$offer['discount_percentage'] / 100 * $price;
            }
        }
    }
}

// Assuming $delivery_charge_rules and function to calculate delivery charges
$delivery_charge = calculate_delivery_charge($total);
$total += $delivery_charge;

echo json_encode(["total" => $total]);

$connection->close();

function calculate_delivery_charge($total) {
    // Example delivery charge rules
    if ($total >= 90) {
        return 0;
    } else if($total >= 50){
        return 2.95;
    } else if($total < 50){
        return 4.95;
    }
}
?>
