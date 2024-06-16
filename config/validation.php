<?php
function ValidateLogin($email, $password) {
    global $conn;

    $query = "SELECT * FROM user_admin WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Assuming passwords are hashed using password_hash() function
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        $stmt->close();
    } else {
        echo 'Prepare failed: (' . $conn->errno . ') ' . $conn->error;
    }
    return false;
}
function Register($email, $name, $last, $password, $username) {
    // Establish database connection using constants
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $last = mysqli_real_escape_string($conn, $last);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password before insertion
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database with hashed password
    $insert = "INSERT INTO user_admin (email, last, name, password, username, type) 
               VALUES ('$email', '$last', '$name', '$hashed_password', '$username', 'user')";

    if (mysqli_query($conn, $insert)) {
        // Get the ID of the newly inserted user
        $user_id = mysqli_insert_id($conn);
        $user_name = mysqli_real_escape_string($conn, $name); // Ensure the name is safe for URL encoding

        // Close connection
        mysqli_close($conn);

        // Redirect to the game page with user ID and name
        header("Location: ../signin.php?id=" . urlencode($user_id) . "&name=" . urlencode($user_name));
        exit();
    } else {
        $report = 'Error: ' . $insert . '<br>' . mysqli_error($conn);
        // Close connection
        mysqli_close($conn);
        return $report;
    }
}
?>
