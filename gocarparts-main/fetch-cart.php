<?php
session_start();
header('Content-Type: application/json');

// Check login
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$user_id = $_SESSION['user_id'];

// DB connection
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$action = $_GET['action'] ?? 'fetch';

switch ($action) {
    case 'fetch':
        $sql = "
            SELECT 
                cart.id AS cart_id,
                cart.product_id,
                cart.quantity,
                p.name AS title,
                p.price,
                p.image_url AS image
            FROM cart
            JOIN products p ON cart.product_id = p.id
            WHERE cart.user_id = ?
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }

        echo json_encode($items);
        $stmt->close();
        break;

    case 'update':
        $cart_id = $_POST['cart_id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;

        if (!$cart_id || !$quantity || $quantity < 1) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid update request"]);
            exit;
        }

        $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("iii", $quantity, $cart_id, $user_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Update failed"]);
        }
        $stmt->close();
        break;

    case 'delete':
        $cart_id = $_POST['cart_id'] ?? null;

        if (!$cart_id) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid delete request"]);
            exit;
        }

        $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $cart_id, $user_id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Delete failed"]);
        }
        $stmt->close();
        break;

    default:
        http_response_code(400);
        echo json_encode(["error" => "Invalid action"]);
}

$conn->close();
