<?php
session_start();
require_once __DIR__ . '../config/configuration.php';

// Check if database connections are established
if (!$connEasy || !$connMedium || !$connHard) {
    $_SESSION['error_message'] = 'Database connection error.';
    header("Location: $_SERVER[HTTP_REFERER]");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['question_id'])) {
    $questionId = $_POST['question_id'];

    // Perform DELETE operation on 'easy_questions' database
    $sqlEasy = "DELETE FROM easy_questions WHERE id = '$questionId'";
    if ($connEasy->query($sqlEasy) === TRUE) {
        $_SESSION['success_message'] = 'Question deleted successfully from Easy Questions.';
    } else {
        $_SESSION['error_message'] = 'Error deleting question from Easy Questions: ' . $connEasy->error;
    }

    // Perform DELETE operation on 'medium_questions' database
    $sqlMedium = "DELETE FROM medium_questions WHERE id = '$questionId'";
    if ($connMedium->query($sqlMedium) === TRUE) {
        $_SESSION['success_message'] .= ' Question deleted successfully from Medium Questions.';
    } else {
        $_SESSION['error_message'] .= ' Error deleting question from Medium Questions: ' . $connMedium->error;
    }

    // Perform DELETE operation on 'hard_questions' database
    $sqlHard = "DELETE FROM medium_questions WHERE id = '$questionId'";
    if ($connHard->query($sqlHard) === TRUE) {
        $_SESSION['success_message'] .= ' Question deleted successfully from Hard Questions.';
    } else {
        $_SESSION['error_message'] .= ' Error deleting question from Hard Questions: ' . $connHard->error;
    }
} else {
    $_SESSION['error_message'] = 'Invalid request.';
}

// Redirect back to the page where the delete operation was initiated
header("Location: $_SERVER[HTTP_REFERER]");
exit();
?>
