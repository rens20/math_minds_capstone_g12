<?php

function ValidateLogin($email, $password) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users_admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if ($password === $user['password']) { // Direct comparison of plain text passwords
            // Login successful
            // Start a session and set session variables as needed
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['type'];

            // Generate a unique token
            $token = bin2hex(random_bytes(16));
            $_SESSION['token'] = $token;

            // Redirect based on user role
            if ($user['type'] === 'admin') {
                header("Location: ../public/admin.php");
            } else {
                header("Location: ../public/home.php");
            }
            exit();
        } else {
            // Password is incorrect
            return "Invalid password.";
        }
    } else {
        // Email not found
        return "No user found with that email.";
    }

    // Close connection
    mysqli_close($conn);
}

function Register($email, $name, $last, $password, $username) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $last = mysqli_real_escape_string($conn, $last);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Store the plain text password in the database
    $insert = "INSERT INTO user_admin (email, last, name, password, username, type) 
               VALUES ('$email', '$last', '$name', '$password', '$username', 'user')";
    
    if (mysqli_query($conn, $insert)) {
        $report = 'Registration Complete!';
    } else {
        $report = 'Error: ' . $insert . '<br>' . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    return $report;
}
