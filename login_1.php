<?php
// Start a session to store user data if needed
session_start();

// Check if the form data is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get user input and prevent SQL injection
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connection parameters
    $db_host = "localhost";
    $db_user = "sandman";
    $db_password = "tQ9472b";
    $db_name = "testDB";
    $table_name = "auth_users";

    // Create a database connection
    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // Check if the connection was successful
    if (!$connection) {s
        die("Connection failed: " . mysqli_connect_error());
    }

    // Protect against SQL injection by using prepared statements
    $sql = "SELECT * FROM $table_name WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a match
    if (mysqli_num_rows($result) > 0) {
        $msg = "<p>You're authorized!</p>";
        // You can set session variables here if needed
        // Example: $_SESSION['username'] = $username;
    } else {
        header("Location: login.html");
        exit;
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    header("Location: login.html");
    exit;
}
?>
