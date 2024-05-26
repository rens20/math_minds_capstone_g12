<?php
require_once __DIR__ . '../config/configuration.php'; 
require_once __DIR__ . '../config/validation.php';

// Check if ID parameter is provided
if (!isset($_GET['id'])) {
    header('Location: quiz.php');
    exit;
}

$id = $_GET['id'];

// Fetch the question details from the database
$sql = "SELECT * FROM easy_questions WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $question = $result->fetch_assoc();
} else {
    // Redirect if the question ID is not found
    header('Location: quiz.php');
    exit;
}

// Handle form submission for updating the question
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $answerA = $_POST['answer_a'];
    $answerB = $_POST['answer_b'];
    $answerC = $_POST['answer_c'];
    $answerD = $_POST['answer_d'];
    $correctAnswer = $_POST['correct_answer'];

    // Update the question in the database
    $sql = "UPDATE hard_questions 
            SET question = '$question', answer_a = '$answerA', answer_b = '$answerB', answer_c = '$answerC', answer_d = '$answerD', correct_answer = '$correctAnswer'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to admin_easy.php after successful update
        header('Location: admin_easy.php');
        exit;
    } else {
        echo '<div class="notification error">Error updating question: ' . $conn->error . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz Question</title>
    <style>
        /* Custom styles */
        body {
            background-color: #f3f4f6;
            color: #4b5563;
            font-family: Arial, sans-serif;
            padding: 16px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            color: #5a67d8;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5a67d8;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #434190;
        }

        .notification {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: none;
        }

        .notification.success {
            background-color: #c6f6d5;
            color: #22543d;
            display: block;
        }

        .notification.error {
            background-color: #fed7d7;
            color: #742a2a;
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Quiz Question</h1>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="question">Question:</label>
                <input type="text" id="question" name="question" value="<?php echo htmlspecialchars($question['question']); ?>">
            </div>

            <div class="mb-4">
                <label for="answer_a">Answer A:</label>
                <input type="text" id="answer_a" name="answer_a" value="<?php echo htmlspecialchars($question['answer_a']); ?>">
            </div>
            <div class="mb-4">
                <label for="answer_b">Answer B:</label>
                <input type="text" id="answer_b" name="answer_b" value="<?php echo htmlspecialchars($question['answer_b']); ?>">
            </div>
            <div class="mb-4">
                <label for="answer_c">Answer C:</label>
                <input type="text" id="answer_c" name="answer_c" value="<?php echo htmlspecialchars($question['answer_c']); ?>">
            </div>
            <div class="mb-4">
                <label for="answer_d">Answer D:</label>
                <input type="text" id="answer_d" name="answer_d" value="<?php echo htmlspecialchars($question['answer_d']); ?>">
            </div>

            <div class="mb-4">
                <label for="correct_answer">Correct Answer:</label>
                <select id="correct_answer" name="correct_answer">
                    <option value="A" <?php if ($question['correct_answer'] == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if ($question['correct_answer'] == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($question['correct_answer'] == 'C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if ($question['correct_answer'] == 'D') echo 'selected'; ?>>D</option>
                </select>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
