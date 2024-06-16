<?php
require_once __DIR__ . '../config/configuration.php'; 
require_once __DIR__ . '../config/validation.php';

session_start();

// Initialize or reset quiz session
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
    $_SESSION['correct_answers'] = 0;
    $_SESSION['user_answers'] = [];
}

// Retrieve questions from the database
$sql = "SELECT id, question, answer_a, answer_b, answer_c, answer_d, correct_answer, image_path FROM hard_questions LIMIT 10";
$result = $conn->query($sql);

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

if (empty($questions)) {
    die('No questions available. Please contact the administrator.');
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['undo'])) {
        // Undo the last answer
        $_SESSION['current_question']--;
        unset($_SESSION['user_answers'][$_SESSION['current_question']]);
        
        header('Location: hard.php?id=' . urlencode($_SESSION['user_id']));
        exit;
    } elseif (isset($_POST['answer'])) {
        $selected_answer = $_POST['answer'];
        $current_question_index = $_SESSION['current_question'];

        // Store the user's answer
        $_SESSION['user_answers'][$current_question_index] = $selected_answer;

        // Check if the answer is correct
        if ($selected_answer == $questions[$current_question_index]['correct_answer']) {
            $_SESSION['correct_answers']++;
        }

        // Move to the next question
        $_SESSION['current_question']++;
    
        if ($_SESSION['current_question'] >= count($questions)) {
            header('Location: quiz_result3.php?id=' . urlencode($_SESSION['user_id']));
            exit;
        }
    } else {
        // No answer selected, redirect back to the quiz page
        header('Location: hard.php?id=' . urlencode($_SESSION['user_id']));
        exit;
    }
}

// Ensure current question index is within the bounds of the available questions
$current_question_index = $_SESSION['current_question'];
if ($current_question_index >= count($questions)) {
    $current_question_index = count($questions) - 1;
}
$current_question = $questions[$current_question_index];
$current_question_number = $current_question_index + 1;
$total_questions = count($questions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("form");
            form.addEventListener("submit", function(event) {
                const selectedAnswer = document.querySelector('input[name="answer"]:checked');
                if (!selectedAnswer) {
                    alert('Please select an answer before proceeding.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="header">
            Quiz Question
          <button class="button" id="help-button" onclick="showHelp()">Help</button>
        </div>
        <div class="progress-container">
            <div class="progress-bar" style="width: <?php echo ($current_question_number / $total_questions) * 100; ?>%;"></div>
        </div>
        <form action="" method="POST" onsubmit="return validateAnswer();">
            <div class="question"><?php echo htmlspecialchars($current_question['question']); ?></div>
            <?php if (!empty($current_question['image_path'])): ?>
                <div><img src="<?php echo htmlspecialchars($current_question['image_path']); ?>" alt="Question Image" style="max-width: 80%; height: auto;"></div>
            <?php endif; ?>
            <ul class="options">
                <?php foreach (['a', 'b', 'c', 'd'] as $option): ?>
                    <li>
                        <input type="radio" required id="answer_<?php echo $option; ?>" name="answer" value="<?php echo strtoupper($option); ?>">
                        <label for="answer_<?php echo $option; ?>" data-label="<?php echo strtoupper($option); ?>">
                            <?php echo htmlspecialchars($current_question['answer_' . $option]); ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="buttons">
                <?php if ($current_question_number > 1): ?>
                    <button type="submit" name="undo" class="button">Undo</button>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
                <button type="submit" class="button">Next</button>
            </div>
        </form>
        <div class="container">
            <!-- Background Music -->
            <audio id="background-music" autoplay loop>
                <source src="./409058515_25809778508620935_5250915706650752386_n.mp4" type="audio/mpeg" hidden>
            </audio>
        </div>
    </div>

    <script>
        function showHelp() {
            // Get the correct answer option and select it
            const correctAnswer = document.querySelector('input[value="<?php echo strtoupper($current_question['correct_answer']); ?>"]');
            if (correctAnswer) {
                correctAnswer.checked = true;
            } else {
                alert('Correct answer not found.');
            }
        }
    </script>
</body>
</html>


 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            animation: fadeIn 0.5s ease-in-out;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #6d28d9;
            margin-bottom: 20px;
        }

        .progress-container {
            background-color: #e5e7eb;
            border-radius: 5px;
            height: 10px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .progress-bar {
            background-color: #6d28d9;
            height: 100%;
            width: 0;
            transition: width 0.3s ease-in-out;
        }

        .question {
            margin-bottom: 20px;
        }

        .options {
            list-style: none;
            padding: 0;
        }

        .options li {
            margin-bottom: 10px;
        }

        .options input[type="radio"] {
            display: none;
        }

        .options label {
            display: flex;
            align-items: center;
            background-color: #e5e7eb;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .options input[type="radio"]:checked + label {
            background-color: #6d28d9;
            color: white;
        }

        .options label::before {
            content: attr(data-label);
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            border: 2px solid #6d28d9;
            border-radius: 50%;
            margin-right: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .options input[type="radio"]:checked + label::before {
            background-color: white;
            color: #6d28d9;
            content: '✔';
            font-size: 14px;
        }

        .options label.correct {
            background-color: #34d399 !important;
            color: white !important;
        }

        .options label.correct::before {
            background-color: white !important;
            color: #34d399 !important;
            content: '✔' !important;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .button {
            background-color: #6d28d9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #5b21b6;
        }

        .button:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
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