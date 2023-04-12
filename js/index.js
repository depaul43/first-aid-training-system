const allFunction = () => {
    const navToggler = () => {
        const navBars = document.querySelector('.fa-bars')
        const navCancel = document.querySelector('.fa-times')
        const lists = document.querySelector('.lists')
        navBars.addEventListener('click', () => {
            navBars.style.display = 'none';
            lists.style.display = "flex";
            navCancel.style.display = 'block';
        })
        navCancel.addEventListener('click', () => {
            navBars.style.display = 'flex'
            navCancel.style.display = 'none';
            lists.style.display = "none";
        })
    }
    navToggler();
}
allFunction();

<
script >
    function openQuiz() {
        document.querySelector(".quiz-content").classList.toggle("show");
    }

function checkAnswers() {
    var q1 = document.querySelector('input[name="q1"]:checked').value;
    var q2 = document.querySelector('input[name="q2"]:checked').value;
    var correct = 0;

    if (q1 === "a") {
        correct++;
    }

    if (q2 === "c") {
        correct++;
    }

    var results = document.querySelector("#quiz-results");
    results.innerHTML = "You got " + correct + " out of 2 questions correct!";
} <
/script>