<!DOCTYPE html>
<html>
<head>
    <title>Mathster's Challenge</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="medium.css" />
</head>
<body>
    <header>
        <div class="container">
            </div>
            <nav>
                <ul>
                    <li><a href="gamepage.php" class="back-btn">Back</a></li>
                    <li><a href="help.php" class="cta">Help</a></li>
                    <li><a href="home.php" class="cta">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="quiz">
            <div id="question-container">
                <div id="progress-bar">
                    <div id="progress"></div>
                </div>
                <div id="question"></div>
                <div id="answers"></div>
                <button type="button" id="submit-btn" disabled>Next</button>
            </div>
            <div id="results-container" style="display:none;">
                <h2>Results:</h2>
                <p id="results"></p>
                <button id="result-btn" style="display:none;">Try Again</button>
                <button class="done-btn" id="done-btn" style="display:none;">Done</button>
            </div>
        </div>
    </main>

    <script>
        // Generate questions and answers
        const questions = [
  {
    question: "What is the value of 5^2?",
    answers: ["25", "15", "26", "30"],
    correct: "25"
  },
  {
    question: "What is the value of 15% of 120?",
    answers: ["29", "16", "18", "30"],
    correct: "18"
  },
  {
    question: "What is the value of 21 - 13?",
    answers: ["13", "9", "10", "8"],
    correct: "8"
  },
  {
    question: "What is the value of 6 × 7?",
    answers: ["43", "48", "54", "42"],
    correct: "42"
  },
  {
    question: "What is the value of 14 + 17?",
    answers: ["35", "32", "31", "34"],
    correct: "31"
  },
  {
    question: "What is the value of 24 ÷ 4?",
    answers: ["10", "7", "6", "9"],
    correct: "6"
  },
  {
    question: "What is the value of 16 × 11?",
    answers: ["176", "173", "180", "187"],
    correct: "176"
  },
  {
    question: "What is the value of 23 - 15?",
    answers: ["7", "9", "10", "8"],
    correct: "8"
  },
  {
    question: "What is the value of 30 × 3?",
    answers: ["91", "90", "100", "105"],
    correct: "90"
  },
  {
    question: "What is the value of 125 ÷ 5?",
    answers: ["27", "30", "25", "40"],
    correct: "25"
  }
]

        // Global variables
        let questionIndex = 0;
        let progress = 0;
        let score = 0;
        let selectedOption = null;

        // Function to start quiz
        function startQuiz() {
            // Show first question
            const questionContainer = document.getElementById("question");
            questionContainer.textContent = questions[questionIndex].question;

            // Generate answer options
            const answers = questions[questionIndex].answers;
            const answersContainer = document.getElementById("answers");
            answersContainer.innerHTML = "";
            for (let i = 0; i < answers.length; i++) {
                const answer = document.createElement("button");
                answer.classList.add("answer");
                answer.textContent = answers[i];
                answer.addEventListener("click", selectAnswer);
                answersContainer.appendChild(answer);
            }

            // Reset submit button
            document.getElementById("submit-btn").disabled = true;
        }

        // Function to select answer
        function selectAnswer(e) {
            const answerContainer = document.getElementsByClassName("answer");
            for (let i = 0; i < answerContainer.length; i++) {
                answerContainer[i].disabled = true;
            }

            selectedOption = e.target;
            selectedOption.classList.add("selected");
            document.getElementById("submit-btn").disabled = false;
        }

        // Function to submit answer
        function submitAnswer() {
            // Remove event listener from answer options
            const answers = document.getElementsByClassName("answer");
            for (let i = 0; i < answers.length; i++) {
                answers[i].removeEventListener("click", selectAnswer);
            }

            // Check if correct answer
            if (selectedOption.textContent === questions[questionIndex].correct) {
                selectedOption.classList.add("correct-answer");
                score++;
            } else {
                selectedOption.classList.add("incorrect-answer");
            }

            // Move to next question or show results
            questionIndex++;
            progress = Math.floor((questionIndex / questions.length) * 100);
            document.getElementById("progress").style.width = progress + "%";

            if (questionIndex < questions.length) {
                const questionContainer = document.getElementById("question");
                questionContainer.textContent = questions[questionIndex].question;

                // Generate answer options
                const answers = questions[questionIndex].answers;
                const answersContainer = document.getElementById("answers");
                answersContainer.innerHTML = "";
                for (let i = 0; i < answers.length; i++) {
                    const answer = document.createElement("button");
                    answer.classList.add("answer");
                    answer.textContent = answers[i];
                    answer.addEventListener("click", selectAnswer);
                    answersContainer.appendChild(answer);
                }

                document.getElementById("submit-btn").disabled = false;
            } else {
                showResults();
            }
        }

        // Function to show results
        function showResults() {
            document.getElementById("results-container").style.display = "block";
            document.getElementById("question-container").style.display = "none";
            document.getElementById("results").textContent = `Your score is ${score} out of ${questions.length}.`;

            // Add color to correct and incorrect answers
            const correctAnswers = document.getElementsByClassName("correct-answer");
            for (let i = 0; i < correctAnswers.length; i++) {
                correctAnswers[i].style.backgroundColor = "green";
            }

            const incorrectAnswers = document.getElementsByClassName("incorrect-answer");
            for (let i = 0; i < incorrectAnswers.length; i++) {
                incorrectAnswers[i].style.backgroundColor = "red";
            }

            // Show try again and done buttons
            document.getElementById("result-btn").style.display = "block";
            document.getElementById("done-btn").style.display = "block";
        }

        // Function to try again
        function tryAgain() {
    // Reset global variables
    questionIndex = 0;
    progress = 0;
    score = 0;
    selectedOption = null;

    // Shuffle questions
    questions.sort(() => Math.random() - 0.5);

    // Reset question container
    document.getElementById("question-container").style.display = "block";
    document.getElementById("results-container").style.display = "none";

    // Reset submit button
    document.getElementById("submit-btn").disabled = true;

    // Reset answers
    const answers = document.getElementsByClassName("answer");
    for (let i = 0; i < answers.length; i++) {
        answers[i].disabled = false;
        answers[i].classList.remove("selected", "correct-answer", "incorrect-answer");
    }

    // Reset question and answers
    const questionContainer = document.getElementById("question");
    questionContainer.textContent = questions[questionIndex].question;

    const answersContainer = document.getElementById("answers");
    answersContainer.innerHTML = "";

    // Start quiz again
    for (let i = 0; i < questions[questionIndex].answers.length; i++) {
        const answer = document.createElement("button");
        answer.classList.add("answer");
        answer.textContent = questions[questionIndex].answers[i];

        // Add event listener for answer buttons
        answer.addEventListener("click", function (event) {
            selectAnswer(event);
            submitAnswer();
        });

        answersContainer.appendChild(answer);
    }

    document.getElementById("submit-btn").disabled = false;
}
        // Event listeners
        document.getElementById("submit-btn").addEventListener("click", submitAnswer);
        document.getElementById("result-btn").addEventListener("click", tryAgain);
        document.getElementById("done-btn").addEventListener("click", () => {
            window.location.href = "home.php";
        });

        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = "gamepage.php";
            }
        }

        // Start quiz
        startQuiz();
    </script>
</body>
</html>