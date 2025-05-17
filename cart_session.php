<?php
session_start();
require 'connection.php';

function addToCart($productId, $quantity = 1) 
{
    global $conn;

    $stmt = $conn->prepare("SELECT nazwa, cena FROM produkty WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) 
    {
        $product = $result->fetch_assoc();

        foreach ($_SESSION['cart'] as &$item) 
        {
            if ($item['id'] == $productId) 
            {
                $item['quantity'] += $quantity;
                return;
            }
        }

        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $product['nazwa'],
            'price' => $product['cena'],
            'quantity' => $quantity
        ];
    }
}
?>