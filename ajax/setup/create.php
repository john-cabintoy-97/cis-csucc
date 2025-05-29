<?php
$servername = "localhost";
$username = "root";
$password = ""; // By default, XAMPP has an empty password for the root user
$dbname = "mydatabase"; // Replace with the name of your database

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the users table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // Create another table (example: products) if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price DECIMAL(10, 2) NOT NULL
    )";
    $conn->exec($sql);

    // Add more table creation statements as needed

    // No output message here
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
