/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What does CPR stand for?",
            "options": [{
                "a": "Cardiopulmonary resuscitation",
                "b": "Cardiovascular respiration process",
                "c": "Cardiac pulmonary respiration",
            }],
            "answer": "Cardiopulmonary resuscitation",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "What is the first step of CPR?",
            "options": [{
                "a": "Check for responsiveness",
                "b": "Open the airway",
                "c": "Begin chest compressions",
            }],
            "answer": "Check for responsiveness",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "How many chest compressions should be given per cycle of CPR?",
            "options": [{
                "a": "10",
                "b": "15",
                "c": "30"
            }],
            "answer": "30",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What is the recommended depth for adult chest compressions during CPR?",
            "options": [{
                "a": "1-2 inches",
                "b": "2-3 inches",
                "c": "3-4 inches",
            }],
            "answer": "2-3 inches",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "What is the ratio of chest compressions to rescue breaths in CPR for adults?",
            "options": [{
                "a": "15:2",
                "b": "30:2",
                "c": "30:1",
            }],
            "answer": "30:2",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "What is the recommended rate of chest compressions per minute during CPR for adults?",
            "options": [{
                "a": "60-80",
                "b": "100-120",
                "c": "140-160",
            }],
            "answer": "100-120",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "What is the purpose of rescue breaths in CPR?",
            "options": [{
                "a": "To circulate oxygen-rich blood to the body",
                "b": "To restart the heart",
                "c": "To clear the airway of obstructions",
            }],
            "answer": "To circulate oxygen-rich blood to the body",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What should you do if an automated external defibrillator (AED) is available during CPR?",
            "options": [{
                "a": "Continue with chest compressions only",
                "b": "Use the AED as soon as possible",
                "c": "Wait for emergency medical services to arrive before using the AED",
            }],
            "answer": "Use the AED as soon as possible",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "What is the recommended ratio of chest compressions to rescue breaths in CPR for children?",
            "options": [{
                "a": "30:2",
                "b": "15:2",
                "c": "5:1",
            }],
            "answer": "15:2",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What should you do if you see someone collapse and they are unresponsive?",
            "options": [{
                "a": "Call for emergency medical services and start CPR",
                "b": "Move them to a comfortable position and wait for medical help",
                "c": "Ask someone else to call for help while you wait with the person",
            }],
            "answer": "Call for emergency medical services and start CPR",
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