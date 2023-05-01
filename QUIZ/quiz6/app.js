/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What is the first step in providing first aid to an accident victim?",
            "options": [{
                "a": "Assess the victim's breathing",
                "b": "Check for any bleeding",
                "c": "Remove the victim from the scene of the accident",
                "d": "Call emergency services"
            }],
            "answer": "Call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "What should you do if someone is bleeding heavily from a wound?",
            "options": [{
                "a": "Apply pressure to the wound",
                "b": "Elevate the wound",
                "c": "Apply a tourniquet",
                "d": "Remove any objects stuck in the wound"
            }],
            "answer": "Apply pressure to the wound",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "What should you do if someone is experiencing shock after an accident?",
            "options": [{
                "a": "Give them something to eat or drink",
                "b": "Elevate their legs",
                "c": "Cover them with a blanket",
                "d": "Keep them talking and conscious"
            }],
            "answer": "Elevate their legs",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What should you do if someone has a suspected neck or spine injury?",
            "options": [{
                "a": "Move them to a more comfortable position",
                "b": "Turn their head to the side",
                "c": "Keep them still and call emergency services",
                "d": "Give them painkillers"
            }],
            "answer": "Keep them still and call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "What should you do if someone is experiencing a seizure after an accident?",
            "options": [{
                "a": "Hold them down and prevent them from moving",
                "b": "Put something in their mouth to prevent them from biting their tongue",
                "c": "Move any objects away from them that could cause injury",
                "d": "All of the above"
            }],
            "answer": "Move any objects away from them that could cause injury",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "What should you do if someone is experiencing chest pain after an accident?",
            "options": [{
                "a": "Have them take deep breaths",
                "b": "Give them aspirin",
                "c": "Have them lie down and rest",
                "d": "Call emergency services"
            }],
            "answer": "Call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "What should you do if someone has a broken bone?",
            "options": [{
                "a": "Try to straighten the bone",
                "b": "Apply a cold compress to the area",
                "c": "Apply a hot compress to the area",
                "d": "Immobilize the area and call emergency services"
            }],
            "answer": "Immobilize the area and call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What should you do if someone is experiencing burns after an accident?",
            "options": [{
                "a": "Apply cold water to the affected area",
                "b": "Apply ointment or butter to the affected area",
                "c": "Cover the affected area with a bandage",
                "d": "None of the above"
            }],
            "answer": "Apply cold water to the affected area",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "What should you do if someone is experiencing breathing difficulties after an accident?",
            "options": [{
                "a": "Have them take deep breaths",
                "b": "Give them a breathing treatment",
                "c": "Place them in a warm room",
                "d": "Call emergency services"
            }],
            "answer": "Call emergency services",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What should you do if someone is experiencing severe pain after an accident?",
            "options": [{
                "a": "Give them painkillers",
                "b": "Have them rest and take deep breaths",
                "c": "Elevate the affected area",
                "d": "Call emergency services"
            }],
            "answer": "Call emergency services",
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