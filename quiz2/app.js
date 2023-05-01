/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What is the first step in providing first aid for a drowning victim?",
            "options": [{
                "a": "Remove victim from water",
                "b": "Check for breathing",
                "c": "Call emergency services",
                "d": "Clear the airway"
            }],
            "answer": "Remove victim from water",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "Which of the following is the correct compression-to-breath ratio for CPR on a drowning victim?",
            "options": [{
                "a": "30 compressions to 2 breaths",
                "b": "15 compressions to 2 breaths",
                "c": "30 compressions to 1 breath",
                "d": "5 compressions to 1 breath"
            }],
            "answer": "30 compressions to 2 breaths",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "What is the recommended minimum depth of water required for diving?",
            "options": [{
                "a": "1 meter",
                "b": " 3 meters",
                "c": " 5 meters",
                "d": " 10 meters"
            }],
            "answer": "3 meters",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "How long should you continue performing CPR on a drowning victim before stopping?",
            "options": [{
                "a": "5 minutes",
                "b": "10 minutes",
                "c": "15 minutes",
                "d": "20 minutes"
            }],
            "answer": "20 minutes",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "Which of the following should you do first when providing CPR to a drowning victim?",
            "options": [{
                "a": "Check for breathing",
                "b": "Clear the airway",
                "c": "Perform chest compressions",
                "d": "Give rescue breaths"
            }],
            "answer": "Clear the airway",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "How can you tell if a drowning victim is still alive?",
            "options": [{
                "a": "They are coughing and breathing",
                "b": "They are motionless and unresponsive",
                "c": "They are blue and cold to the touch",
                "d": "They are conscious and alert"
            }],
            "answer": "They are coughing and breathing",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "Which of the following is a sign of dry drowning?",
            "options": [{
                "a": "Coughing and wheezing",
                "b": "Difficulty breathing",
                "c": "Vomiting",
                "d": "Loss of consciousness"
            }],
            "answer": "Difficulty breathing",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What should you do if a drowning victim is conscious and alert?",
            "options": [{
                "a": "Perform CPR",
                "b": "Monitor them for signs of breathing difficulties",
                "c": "Give them water to drink",
                "d": "Allow them to rest"
            }],
            "answer": "Monitor them for signs of breathing difficulties",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "Which of the following is a sign of secondary drowning?",
            "options": [{
                "a": " Difficulty breathing",
                "b": "Chest pain",
                "c": "Vomiting",
                "d": "All of the above"
            }],
            "answer": "All of the above",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What should you do if you suspect someone is drowning but you cannot swim?",
            "options": [{
                "a": " Jump in and try to rescue them",
                "b": "Call for help",
                "c": "Throw them a flotation device",
                "d": "None of the above"
            }],
            "answer": "Call for help",
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