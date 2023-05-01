/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What is the first step in treating a minor burn?",
            "options": [{
                "a": "Apply ice to the affected area",
                "b": "Run cool water over the affected area",
                "c": "Cover the affected area with a bandage",
                "d": "Apply ointment to the affected area"
            }],
            "answer": "Run cool water over the affected area",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "What is the most effective way to cool a burn?",
            "options": [{
                "a": "Applying ice directly to the affected area",
                "b": "Applying a wet cloth to the affected area",
                "c": "Running cool water over the affected area",
                "d": "Applying lotion to the affected area"
            }],
            "answer": "Running cool water over the affected area",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "Which of the following is a sign of a serious burn?",
            "options": [{
                "a": "Swelling",
                "b": "Redness",
                "c": "Blisters",
                "d": "All of the above"
            }],
            "answer": "All of the above",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What should you do if someone's clothes catch fire?",
            "options": [{
                "a": "Pour water over them",
                "b": "Smother the flames with a blanket or towel",
                "c": "Beat the flames with a towel",
                "d": "Remove the clothing immediately"
            }],
            "answer": "Smother the flames with a blanket or towel",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "How long should you hold a burn under cool water?",
            "options": [{
                "a": "5 minutes",
                "b": "10 minutes",
                "c": "15 minutes",
                "d": "20 minutes"
            }],
            "answer": "10 minutes",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "What should you do if someone has a chemical burn?",
            "options": [{
                "a": "Rinse the affected area with cool water for 20 minutes",
                "b": "Apply ice to the affected area",
                "c": "Cover the affected area with a bandage",
                "d": "Apply ointment to the affected area"
            }],
            "answer": "Rinse the affected area with cool water for 20 minutes",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "Which of the following should not be applied to a burn?",
            "options": [{
                "a": "Butter",
                "b": "Ointment",
                "c": "Aloe vera gel",
                "d": "Petroleum jelly"
            }],
            "answer": "Butter",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "What should you do if a burn starts to blister?",
            "options": [{
                "a": "Pop the blister with a needle",
                "b": "Leave the blister alone",
                "c": "Cover the blister with a bandage",
                "d": "Apply ointment to the blister"
            }],
            "answer": "Leave the blister alone",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "How should you treat a third-degree burn?",
            "options": [{
                "a": "Run cool water over the affected area",
                "b": "Apply ointment to the affected area",
                "c": "Cover the affected area with a bandage",
                "d": "Seek medical attention immediately"
            }],
            "answer": "Seek medical attention immediately",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "Which of the following is a sign of a severe burn injury?",
            "options": [{
                "a": "Pain",
                "b": "Redness",
                "c": "Swelling",
                "d": "All of the above"
            }],
            "answer": "All of the above",
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