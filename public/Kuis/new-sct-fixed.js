// Variabel questions didefinisikan di luar fungsi
// let questions = null;

const questionElement = document.getElementById("question");
// const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
const scoreEl = document.getElementById("score");
let currentQuestionIndex;
let score = 0;
scoreEl.textContent = score;

let questions = [];

// Fungsi untuk memulai kuis
function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    // showQuestion();
}

// Fungsi untuk mengambil pertanyaan dari backend
function fetchQuestions() {
    // console.log("masuk", question == null);
    fetch("http://127.0.0.1:8000/api/kuis")
        .then((response) => response.json())
        .then((data) => {
            // console.log("data", data);
            // questions = data; // Mengisi nilai questions dengan data dari backend
            if (data !== null) {
                let soal = data.data;
                questions = soal;

                console.log("question", questions);
                showQuestions(questions); // Memanggil showQuestions setelah mendapatkan data
            } else {
                console.error("Error: Failed to fetch questions from API.");
            }
        })
        .catch((error) => console.error("Error:", error));
}

// Fungsi untuk menampilkan pertanyaan yang diterima dari backend
function showQuestions(data) {
    // Pastikan questions tidak null sebelum digunakan
    if (data !== null) {
        // Kosongkan elemen HTML untuk menampilkan pertanyaan
        questionElement.innerHTML = "";

        // Iterasi melalui array pertanyaan yang diterima
        data.forEach((question, index) => {
            // console.log("question", question);
            // Buat elemen untuk menampilkan teks pertanyaan
            const questionTextElement = document.createElement("div");
            questionTextElement.id = "soal-" + index;
            questionTextElement.classList.add("question-text");

            if (index != 0) {
                questionTextElement.style.display = "none";
            }

            questionTextElement.textContent = `${index + 1}. ${
                question.question
            }`;

            // Tambahkan elemen teks pertanyaan ke dalam elemen HTML utama
            questionElement.appendChild(questionTextElement);

            // Iterasi melalui array jawaban setiap pertanyaan
            question.answers.forEach((answer, index_answer) => {
                // Buat elemen untuk menampilkan tombol jawaban
                const answerButton = document.createElement("button");
                answerButton.classList.add("btn");
                answerButton.id = "answer-" + index + index_answer;
                answerButton.textContent = answer;

                questionTextElement.appendChild(answerButton);

                // Tambahkan event listener untuk menangani klik pada tombol jawaban
                answerButton.addEventListener("click", () =>
                    handleAnswerClick(
                        question.correct_answer - 1,
                        index_answer,
                        index
                    )
                );

                // Tambahkan tombol jawaban ke dalam elemen HTML utama
                // answerButtons.appendChild(answerButton);
            });

            const nextBtn = document.createElement("button");
            nextBtn.textContent = "Next";

            const prevBtn = document.createElement("button");
            prevBtn.textContent = "Previous";

            nextBtn.addEventListener("click", () =>
                controlQuestion(index, false, data.length)
            );

            prevBtn.addEventListener("click", () =>
                controlQuestion(index, true, data.length)
            );

            questionTextElement.appendChild(prevBtn);
            questionTextElement.appendChild(nextBtn);
        });
    } else {
        console.error("Error: questions is null");
    }
}

function handleAnswerClick(
    question_answer_index,
    index_answer,
    index_question
) {
    console.log("answer" + index_question + index_answer);
    const selectedAnswer = document.getElementById(
        "answer-" + index_question + index_answer
    );

    selectedAnswer.classList.remove("btn");
    selectedAnswer.classList.add("btn-selected");

    if (question_answer_index == index_answer) {
        score += 1;
    }

    scoreEl.textContent = score;
    console.log("current score", score);
}

function controlQuestion(index, is_prev, question_length) {
    let question_number = is_prev ? index - 1 : index + 1;
    if (question_number > question_length && question_number == -1) {
        return;
    } else {
        const show_question = document.getElementById(
            "soal-" + question_number
        );
        const question = document.getElementById("soal-" + index);
        question.style.display = "none";
        show_question.style.display = "";
    }
}

// Fungsi untuk menampilkan pertanyaan
// function showQuestion() {
//     resetState();
//     let currentQuestion = questions[currentQuestionIndex];
//     questionElement.innerHTML =
//         currentQuestionIndex + 1 + ". " + currentQuestion.question;
//     currentQuestion.answer.forEach((answer) => {
//         const button = document.createElement("button");
//         button.innerHTML = answer.text;
//         button.classList.add("btn");
//         answerButtons.appendChild(button);
//         if (answer.correct) {
//             button.dataset.correct = answer.correct;
//         }
//         button.addEventListener("click", selectAnswer);
//     });
// }

// Fungsi untuk mengatur ulang keadaan tombol dan jawaban
function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
    Array.from(answerButtons.children).forEach((button) => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

// Fungsi untuk menangani klik pada jawaban
function selectAnswer(e) {
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect");
    }
}

// Fungsi untuk menampilkan skor setelah kuis selesai
function showScore() {
    resetState();
    questionElement.innerHTML = `You Scored ${score} out of ${questions.length}!`;
    nextButton.innerHTML = "Play Again";
    nextButton.style.display = "block";
}

// Fungsi untuk menangani tombol "Next"
function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        showScore();
    }
}

// Event listener untuk tombol "Next"
nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
        startQuiz();
    }
});

// Memulai kuis saat halaman dimuat
fetchQuestions();
startQuiz();
