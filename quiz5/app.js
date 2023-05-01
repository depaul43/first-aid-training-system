/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What is the first step you should take if someone is electrocuted?",
            "options": [{
                "a": "Call 911",
                "b": "Touch the person to see if they are responsive",
                "c": "Move the person away from the electrical source",
                "d": "Turn off the power source"
            }],
            "answer": "Move the person away from the electrical source",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "How should you remove a person from a live electrical source?",
            "options": [{
                "a": "Use a wooden stick or a non-conductive object to push them away",
                "b": "Pull them away with your bare hands",
                "c": "Call 911 and wait for help to arrive",
                "d": "None of the above"
            }],
            "answer": "Use a wooden stick or a non-conductive object to push them away",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "What should you do if someone is unconscious after being electrocuted?",
            "options": [{
                "a": "Pour water on their face",
                "b": "Start CPR immediately",
                "c": "Check their breathing and pulse",
                "d": "Give them a shock with a defibrillator"
            }],
            "answer": "Check their breathing and pulse",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What is the recommended first aid for electrical burns?",
            "options": [{
                "a": "Apply ice to the affected area",
                "b": "Apply aloe vera gel to the affected area",
                "c": "Cover the affected area with a sterile dressing",
                "d": "Do nothing and wait for help to arrive"
            }],
            "answer": "Cover the affected area with a sterile dressing",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "Why is it important to turn off the power source before attempting to help someone who has been electrocuted?",
            "options": [{
                "a": "To prevent further electrical injuries",
                "b": "To avoid damaging the electrical equipment",
                "c": "To conserve electricity",
                "d": "None of the above"
            }],
            "answer": "To prevent further electrical injuries",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "What should you do if someone has a severe electrical shock and is unresponsive?",
            "options": [{
                "a": "Start CPR immediately",
                "b": "Wait for help to arrive",
                "c": "Pour water on their face",
                "d": "Perform the Heimlich maneuver"
            }],
            "answer": "Wait for help to arrive",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "What is the recommended first aid for a minor electrical shock?",
            "options": [{
                "a": "Apply ice to the affected area",
                "b": "Apply aloe vera gel to the affected area",
                "c": "Wash the affected area with soap and water",
                "d": "Cover the affected area with a sterile dressing"
            }],
            "answer": "Wash the affected area with soap and water",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What is the recommended first aid for someone who has ingested a battery?",
            "options": [{
                "a": "A. Give them milk to drink",
                "b": "B. Induce vomiting",
                "c": "C. Call 911 and wait for help to arrive arrive",
                "d": "D. None of the above"
            }],
            "answer": "Call 911 and wait for help to arrive arrive",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "What should you do if someone has been struck by lightning?",
            "options": [{
                "a": "Perform CPR immediately",
                "b": "Wait for help to arrive",
                "c": "Cover the person with a blanket",
                "d": "Check their breathing and pulse"
            }],
            "answer": "Check their breathing and pulse",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What is the recommended first aid for someone who has received an electrical shock to their eyes?",
            "options": [{
                "a": "Wash their eyes with water immediately",
                "b": "Apply a sterile dressing over the eyes",
                "c": "Wait for help to arrive",
                "d": "Apply ice to the eyes"
            }],
            "answer": "Wash their eyes with water immediately",
            "score": 0,
            "status": ""
        },
    ]
}



var quizApp = function() {

    this.score = 0;
    this.qno = 1;
    this.currentque = 0;
    var totalque = quiz.JS.length;


    this.displayQuiz = function(cque) {
        this.currentque = cque;
        if (this.currentque < totalque) {
            $("#tque").html(totalque);
            $("#previous").attr("disabled", false);
            $("#next").attr("disabled", false);
            $("#qid").html(quiz.JS[this.currentque].id + '.');


            $("#question").html(quiz.JS[this.currentque].question);
            $("#question-options").html("");
            for (var key in quiz.JS[this.currentque].options[0]) {
                if (quiz.JS[this.currentque].options[0].hasOwnProperty(key)) {

                    $("#question-options").append(
                        "<div class='form-check option-block'>" +
                        "<label class='form-check-label'>" +
                        "<input type='radio' class='form-check-input' name='option'   id='q" + key + "' value='" + quiz.JS[this.currentque].options[0][key] + "'><span id='optionval'>" +
                        quiz.JS[this.currentque].options[0][key] +
                        "</span></label>"
                    );
                }
            }
        }
        if (this.currentque <= 0) {
            $("#previous").attr("disabled", true);
        }
        if (this.currentque >= totalque) {
            $('#next').attr('disabled', true);
            for (var i = 0; i < totalque; i++) {
                this.score = this.score + quiz.JS[i].score;
            }
            return this.showResult(this.score);
        }
    }

    this.showResult = function(scr) {
        $("#result").addClass('result');
        $("#result").html("<h1 class='res-header'>Total Score: &nbsp;" + scr + '/' + totalque + "</h1>");
        for (var j = 0; j < totalque; j++) {
            var res;
            if (quiz.JS[j].score == 0) {
                res = '<span class="wrong">' + quiz.JS[j].score + '</span><i class="fa fa-remove c-wrong"></i>';
            } else {
                res = '<span class="correct">' + quiz.JS[j].score + '</span><i class="fa fa-check c-correct"></i>';
            }
            $("#result").append(
                '<div class="result-question"><span>Q ' + quiz.JS[j].id + '</span> &nbsp;' + quiz.JS[j].question + '</div>' +
                '<div><b>Correct answer:</b> &nbsp;' + quiz.JS[j].answer + '</div>' +
                '<div class="last-row"><b>Score:</b> &nbsp;' + res +

                '</div>'

            );

        }
    }

    this.checkAnswer = function(option) {
        var answer = quiz.JS[this.currentque].answer;
        option = option.replace(/\</g, "&lt;") //for <
        option = option.replace(/\>/g, "&gt;") //for >
        option = option.replace(/"/g, "&quot;")

        if (option == quiz.JS[this.currentque].answer) {
            if (quiz.JS[this.currentque].score == "") {
                quiz.JS[this.currentque].score = 1;
                quiz.JS[this.currentque].status = "correct";
            }
        } else {
            quiz.JS[this.currentque].status = "wrong";
        }

    }

    this.changeQuestion = function(cque) {
        this.currentque = this.currentque + cque;
        this.displayQuiz(this.currentque);

    }

}


var jsq = new quizApp();

var selectedopt;
$(document).ready(function() {
    jsq.displayQuiz(0);

    $('#question-options').on('change', 'input[type=radio][name=option]', function(e) {

        //var radio = $(this).find('input:radio');
        $(this).prop("checked", true);
        selectedopt = $(this).val();
    });



});




$('#next').click(function(e) {
    e.preventDefault();
    if (selectedopt) {
        jsq.checkAnswer(selectedopt);
    }
    jsq.changeQuestion(1);
});

$('#previous').click(function(e) {
    e.preventDefault();
    if (selectedopt) {
        jsq.checkAnswer(selectedopt);
    }
    jsq.changeQuestion(-1);
});