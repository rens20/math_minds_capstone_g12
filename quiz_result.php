<?php
session_start();

// Check if the quiz is complete
if (!isset($_SESSION['current_question']) || $_SESSION['current_question'] < 10) {
    header('Location: easy.php');
    exit;
}

// Get the total correct answers
$total_correct = $_SESSION['correct_answers'];
$user_answers = $_SESSION['user_answers'];

// Retrieve questions from the database
require_once __DIR__ . '../config/configuration.php';
$sql = "SELECT id, question, answer_a, answer_b, answer_c, answer_d, correct_answer FROM easy_questions LIMIT 10";
$result = $conn->query($sql);

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

// Clear the quiz session data
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f3f4f6;
            color: #4b5563;
        }

        .violet-theme {
            --tw-text-opacity: 1;
            color: rgba(156, 163, 175, var(--tw-text-opacity));
        }

        .violet-theme-bg {
            --tw-bg-opacity: 1;
            background-color: rgba(156, 163, 175, var(--tw-bg-opacity));
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
        }

        .modal-header {
            font-size: 24px;
            font-weight: bold;
            color: #6d28d9;
            margin-bottom: 10px;
        }

        .modal-body {
            max-height: 400px;
            overflow-y: auto;
        }

        .modal-footer {
            text-align: right;
        }

        .close-button {
            background-color: #6d28d9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-button:hover {
            background-color: #5b21b6;
        }
       #view-answers-button{
        background-color: #6d28d9;
        color: #f3f4f6;
       }
    </style>
</head>

<body class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden fade-in">
        <div class="p-4">
            <h1 class="text-2xl font-semibold violet-theme">Quiz Results</h1>
            <p class="mt-4 text-lg">You answered <span class="font-bold"><?php echo $total_correct; ?></span> out of 10 questions correctly.</p>
            <a href="easy.php" class="block mt-4 text-center bg-violet-500 hover:bg-violet-600 text-black font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">
                Try Again
            </a>
            <button id="view-answers-button"  class="block mt-4 text-center   hover:bg-violet-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-opacity-50">
                View Answers
            </button>
        </div>
    </div>

    <div id="answers-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">Correct and Wrong Answers</div>
            <div class="modal-body">
                <ul>
                    <?php foreach ($questions as $index => $question): ?>
                        <li class="mb-2">
                            <strong>Q<?php echo $index + 1; ?>: <?php echo $question['question']; ?></strong><br>
                            <span>Your answer: <?php echo isset($user_answers[$index]) ? $user_answers[$index] : 'No answer'; ?></span><br>
                            <span>Correct answer: <?php echo $question['correct_answer']; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="close-button" id="close-modal">Close</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('view-answers-button').addEventListener('click', function() {
            document.getElementById('answers-modal').style.display = 'flex';
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('answers-modal').style.display = 'none';
        });
    </script>
</body>

</html>

