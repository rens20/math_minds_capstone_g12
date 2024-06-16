<?php
session_start();
require_once __DIR__ . '../config/configuration.php';
require_once __DIR__ . '../config/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $question = $_POST['question'];
    $answerA = $_POST['answer_a'];
    $answerB = $_POST['answer_b'];
    $answerC = $_POST['answer_c'];
    $answerD = $_POST['answer_d'];
    $correctAnswer = $_POST['correct_answer'];
    $imagePath = '';

    // Handle file upload
    if (isset($_FILES['question_image']) && $_FILES['question_image']['error'] === UPLOAD_ERR_OK) {
        $imageFileName = $_FILES['question_image']['name'];
        $imageTempName = $_FILES['question_image']['tmp_name'];
        $imageUploadPath = 'image/' . $imageFileName;

        $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];
        $fileExtension = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedfileExtensions)) {
            if (!is_dir('image')) {
                mkdir('image', 0777, true);
            }
            
            if (move_uploaded_file($imageTempName, $imageUploadPath)) {
                $imagePath = $imageUploadPath;
            } else {
                echo '<div class="notification error">There was an error moving the uploaded file.</div>';
            }
        } else {
            echo '<div class="notification error">Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions) . '</div>';
        }
    } else {
        if ($_FILES['question_image']['error'] !== UPLOAD_ERR_NOFILE) {
            echo '<div class="notification error">File upload error. Error code: ' . $_FILES['question_image']['error'] . '</div>';
        }
    }

    // Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO medium_questions (question, answer_a, answer_b, answer_c, answer_d, correct_answer, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $question, $answerA, $answerB, $answerC, $answerD, $correctAnswer, $imagePath);

    if ($stmt->execute()) {
        echo '<div class="notification success">Question added successfully.</div>';
    } else {
        echo '<div class="notification error">Error: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}

// Retrieve all questions from the database
$sql = "SELECT * FROM medium_questions";
$result = $conn->query($sql);

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz Question</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Admin Page</h1>
        </header>

        <div>
            <a href="admin_easy.php"><button>Easy Questions</button></a>
            <a href="admin_medium.php"><button>Medium Questions</button></a>
            <a href="admin_hard.php"><button>Hard Questions</button></a>
        </div>
        <h1>Add Quiz Question</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="question">Question:</label>
                <input type="text" id="question" name="question" required>
            </div>

            <div class="mb-4">
                <label for="answer_a">Answer A:</label>
                <input type="text" id="answer_a" name="answer_a" required>
            </div>
            <div class="mb-4">
                <label for="answer_b">Answer B:</label>
                <input type="text" id="answer_b" name="answer_b" required>
            </div>
            <div class="mb-4">
                <label for="answer_c">Answer C:</label>
                <input type="text" id="answer_c" name="answer_c" required>
            </div>
            <div class="mb-4">
                <label for="answer_d">Answer D:</label>
                <input type="text" id="answer_d" name="answer_d" required>
            </div>

            <div class="mb-4">
                <label for="correct_answer">Correct Answer:</label>
                <select id="correct_answer" name="correct_answer" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="question_image">Question Image:</label>
                <input type="file" id="question_image" name="question_image" accept="image/*">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="container">
        <h2>Existing Questions</h2>
        <?php if (count($questions) > 0): ?>
            <ul>
                <?php foreach ($questions as $question): ?>
                    <li>
                        <div class="font-semibold"><?php echo htmlspecialchars($question['question']); ?></div>
                        <div>Answer A: <?php echo htmlspecialchars($question['answer_a']); ?></div>
                        <div>Answer B: <?php echo htmlspecialchars($question['answer_b']); ?></div>
                        <div>Answer C: <?php echo htmlspecialchars($question['answer_c']); ?></div>
                        <div>Answer D: <?php echo htmlspecialchars($question['answer_d']); ?></div>
                        <div class="font-bold">Correct Answer: <?php echo htmlspecialchars($question['correct_answer']); ?></div>
                        <?php if ($question['image_path']): ?>
                            <div><img src="<?php echo htmlspecialchars($question['image_path']); ?>" alt="Question Image" style="max-width: 100%; height: auto;"></div>
                        <?php endif; ?>
                        <a href="edit_question2.php?id=<?php echo $question['id']; ?>">Edit</a>
                        <a href="delete_question2.php?id=<?php echo $question['id']; ?>">Delete</a>
                        
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No questions found.</p>
        <?php endif; ?>
    </div>
</body>

</html>





    <style>
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
            animation: fadeIn 0.5s ease-in-out;
        }

        h1, h2 {
            color: #5a67d8;
            text-align: center;
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
            animation: fadeIn 0.5s ease-in-out;
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

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #f3f4f6;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            margin-bottom: 10px;
            animation: fadeIn 0.5s ease-in-out;
        }

        a {
            color: #5a67d8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
