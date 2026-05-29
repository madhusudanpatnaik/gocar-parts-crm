<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect POST data
    $product_id = $_POST['product_id'] ?? '';
    $name       = $_POST['name'] ?? '';
    $email      = $_POST['email'] ?? '';
    $phone      = $_POST['phone'] ?? '';
    $zipcode    = $_POST['zipcode'] ?? '';
    $price      = $_POST['price'] ?? '';
    $miles      = $_POST['miles'] ?? '';
    $notes      = $_POST['notes'] ?? '';
    $mechanic   = $_POST['mechanic'] ?? '';

    /** ---- DATABASE CONNECTION ---- **/
    $host = "mysql";          // DB host
    $user = "root";               // DB username
    $pass = "REDACTED";                   // DB password
    $db   = "REDACTED_DB"; // DB name

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }

    // Escape inputs for security
    $product_id = $conn->real_escape_string($product_id);
    $name       = $conn->real_escape_string($name);
    $email      = $conn->real_escape_string($email);
    $phone      = $conn->real_escape_string($phone);
    $zipcode    = $conn->real_escape_string($zipcode);
    $price      = $conn->real_escape_string($price);
    $miles      = $conn->real_escape_string($miles);
    $notes      = $conn->real_escape_string($notes);
    $mechanic   = $conn->real_escape_string($mechanic);

    // Insert into DB
    $sql = "INSERT INTO get_custom_quote 
            (name, email, phone, zipcode, preferred_price, preferred_miles, notes, need_mechanic) 
            VALUES 
            ('$name', '$email', '$phone', '$zipcode', '$price', '$miles', '$notes', '$mechanic')";

    if ($conn->query($sql) !== TRUE) {
        echo "Database Error: " . $conn->error;
        $conn->close();
        exit;
    }

    $conn->close();

    /** ---- SEND EMAIL ---- **/
    $to      = "admin@example.com";
    $subject = "Custom Quote Request";
    $message = "Product ID: $product_id\n"
             . "Name: $name\n"
             . "Email: $email\n"
             . "Phone: $phone\n"
             . "Zipcode: $zipcode\n"
             . "Price: $price\n"
             . "Miles: $miles\n"
             . "Notes: $notes\n"
             . "Mechanic: $mechanic";

    mail($to, $subject, $message);

    echo "success";
}
?>
