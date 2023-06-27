<?php
$servername = "localhost"; // replace with your MySQL server name
$username = "asqaured_root"; // replace with your MySQL username
$password = "rootroot"; // replace with your MySQL password
$database = "asqaured_jennysnursing"; // replace with your MySQL database name


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dummyUsername = "jncadmin"; // replace with your desired dummy username
$dummyPassword = "jnc@admin"; // replace with your desired dummy password

// Query to fetch user record
$sql = "SELECT * FROM admin_login WHERE username = '$dummyUsername' AND password = '$dummyPassword'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $adminName = $row["name"];
    echo "Login successful. Welcome, " . $adminName;
} else {
    echo "Invalid username or password";
}

// Close connection
$conn->close();
?>
