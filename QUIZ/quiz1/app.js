/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "Which of the following is the first step in providing first aid for poisoning??",
            "options": [{
                "a": "Induce vomiting",
                "b": "Call emergency services",
                "c": "Give the person water to drink",
                "d": "Apply a cold compress to the affected area"
            }],
            "answer": "Call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "What should be done immediately after a person has ingested a poisonous substance?",
            "options": [{
                "a": "Induce vomiting",
                "b": "Administer activated charcoal",
                "c": "Give the person water to drink",
                "d": "Monitor the person's breathing and pulse"
            }],
            "answer": "Induce vomiting",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "What should be done if the person is unconscious after poisoning?",
            "options": [{
                "a": "Administer an antidote",
                "b": "Start CPR",
                "c": "Place the person in the recovery position",
                "d": "Apply a cold compress to the affected area"
            }],
            "answer": "Start CPR",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What is the recommended position for a person who has been poisoned and is conscious?",
            "options": [{
                "a": "Standing upright",
                "b": "Lying flat on the back",
                "c": "Sitting upright",
                "d": "Lying on the side with the head slightly elevated"
            }],
            "answer": "Lying on the side with the head slightly elevated",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "What is the recommended treatment for poisoning caused by insect bites or stings?",
            "options": [{
                "a": "Apply a warm compress",
                "b": "Apply a cold compress",
                "c": "Apply a bandage tightly around the affected area",
                "d": "Remove any visible stingers with tweezers"
            }],
            "answer": "Apply a cold compress",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "What should be done if the person has inhaled poisonous fumes?",
            "options": [{
                "a": "Induce vomiting",
                "b": "Administer activated charcoal",
                "c": "Move the person to an area with fresh air",
                "d": "Apply a cold compress to the affected area"
            }],
            "answer": "Move the person to an area with fresh air",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "What should be done if the person has been poisoned by skin contact with a poisonous substance?",
            "options": [{
                "a": "Administer an antidote",
                "b": "Wash the affected area with water and soap",
                "c": "Cover the affected area with a bandage",
                "d": "Apply a warm compress to the affected area"
            }],
            "answer": "Wash the affected area with water and soap",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What is the recommended treatment for poisoning caused by swallowing batteries?",
            "options": [{
                "a": " Induce vomiting",
                "b": " Administer activated charcoal",
                "c": " Drink milk",
                "d": " Call emergency services immediately"
            }],
            "answer": "Call emergency services immediately",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "What should be done if the person has been poisoned by ingesting a household cleaning product?",
            "options": [{
                "a": " Drink water to dilute the substance",
                "b": " Induce vomiting",
                "c": " Call poison control or emergency services immediately",
                "d": " Apply a warm compress to the affected area"
            }],
            "answer": "Call poison control or emergency services immediately",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What should be done if the person has been bitten by a venomous snake?",
            "options": [{
                "a": " Apply a tourniquet to the affected area",
                "b": " Cut open the wound and suck out the venom",
                "c": " Move the person to an area with fresh air",
                "d": " Call emergency services immediately"
            }],
            "answer": "Call emergency services immediately",
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