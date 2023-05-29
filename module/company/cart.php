<?php
session_start();

// Check if the cart session variable is set
if (isset($_SESSION['cart'])) {
    // Retrieve the cart items
    $cartItems = $_SESSION['cart'];

    // Iterate over the cart items and display the product details
    foreach ($cartItems as $item) {
        // Access the product details using $item and display them as needed
        echo 'Product ID: ' . $item->Product_ID . '<br>';
        echo 'Product Name: ' . $item->Product_Name . '<br>';
        // Display other product details
        echo '<br>';
    }
} else {
    echo 'Cart is empty.';
}
?>