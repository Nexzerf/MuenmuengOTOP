<?php
// Database configuration
$servername = "localhost";
$dbUsername = "root"; // Replace with your database username
$dbPassword = "";     // Replace with your database password
$dbname = "shop";     // Database name

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if username and password fields are set and not empty
if (isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] !== "" && $_POST['password'] !== "") {
    $inputUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $inputPassword = mysqli_real_escape_string($conn, $_POST['password']);

    // Prepared statement for safer query
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Check if statement prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $inputUsername, $inputPassword);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if the query returns a matching user
        if (mysqli_num_rows($result) > 0) {
            // Login successful, redirect to homepage
            header("Location: homepage.html");
            exit();
        } else {
            // Invalid credentials
            echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้องน้า ลองใหม่อีกครั้งงงงง";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL";
    }
} else {
    // If either username or password is empty, show an error message
    echo "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน";
}

// Close connection
mysqli_close($conn);
?>
