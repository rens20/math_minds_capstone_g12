<?php
// Initialize error array
$errors = [];

// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize form inputs
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validate form inputs
    if (empty($firstName)) {
        $errors[] = 'First name is required.';
    }
    if (empty($lastName)) {
        $errors[] = 'Last name is required.';
    }
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $query = "INSERT INTO users (firstName, lastName, username, email, password)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $firstName, $lastName, $username, $email, $hashedPassword);
        $result = $stmt->execute();

        if ($result) {
            header('Location: success.php');
            exit;
        } else {
            $errors[] = 'Database error: ' . $conn->error;
        }
    }
}

// Display errors
if (!empty($errors)) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error) . '</li>';
    }
    echo '</ul>';
}

// Display form
echo '<form action="submit.php" method="post">';
echo '<label for="firstName">First Name:</label>';
echo '<input type="text" name="firstName" id="firstName" value="' . htmlspecialchars($firstName ?? '') . '">';
echo '<br>';
echo '<label for="lastName">Last Name:</label>';
echo '<input type="text" name="lastName" id="lastName" value="' . htmlspecialchars($lastName ?? '') . '">';
echo '<br>';
echo '<label for="username">Username:</label>';
echo '<input type="text" name="username" id="username" value="' . htmlspecialchars($username ?? '') . '">';
echo '<br>';
echo '<label for="email">Email:</label>';
echo '<input type="email" name="email" id="email" value="' . htmlspecialchars($email ?? '') . '">';
echo '<br>';
echo '<label for="password">Password:</label>';
echo '<input type="password" name="password" id="password">';
echo '<br>';
echo '<button type="submit">Submit</button>';
echo '</form>';