/* Quiz source: w3schools.com */

var quiz = {
    "JS": [{
            "id": 1,
            "question": "What is the first step you should take when you encounter a person who is bleeding?",
            "options": [{
                "a": "Put pressure on the wound",
                "b": "Apply a tourniquet",
                "c": "Elevate the affected limb",
                "d": "Call for emergency medical assistance"
            }],
            "answer": "Call for emergency medical assistance",
            "score": 0,
            "status": ""
        },
        {
            "id": 2,
            "question": "Which of the following is the most effective method to control external bleeding?",
            "options": [{
                "a": "Elevating the affected limb",
                "b": "Applying a tourniquet",
                "c": "Applying pressure to the wound",
                "d": "None of the above"
            }],
            "answer": "Applying pressure to the wound",
            "score": 0,
            "status": ""
        },
        {
            "id": 3,
            "question": "What is the best way to dress a wound to stop bleeding?",
            "options": [{
                "a": "Use sterile gauze and apply direct pressure",
                "b": "Apply a tourniquet",
                "c": "Cover the wound with a clean cloth",
                "d": "None of the above"
            }],
            "answer": "Use sterile gauze and apply direct pressure",
            "score": 0,
            "status": ""
        },
        {
            "id": 4,
            "question": "What should you do if you encounter a person with an object impaled in their body?",
            "options": [{
                "a": "Remove the object immediately",
                "b": "Keep the object in place and seek medical attention",
                "c": "Apply a tourniquet above the wound",
                "d": "Apply pressure to the wound"
            }],
            "answer": "Keep the object in place and seek medical attention",
            "score": 0,
            "status": ""
        },
        {
            "id": 5,
            "question": "What should you do if a person is bleeding from their nose??",
            "options": [{
                "a": "Apply direct pressure to the nose",
                "b": "Tilt the head forward and pinch the nostrils",
                "c": "Tilt the head back and apply pressure to the nose",
                "d": "None of the above"
            }],
            "answer": "Tilt the head forward and pinch the nostrils",
            "score": 0,
            "status": ""
        },
        {
            "id": 6,
            "question": "When applying direct pressure to a wound, how long should you maintain the pressure?",
            "options": [{
                "a": "1 minute",
                "b": "5 minutes",
                "c": "10 minutes",
                "d": "Until the bleeding stops"
            }],
            "answer": "Until the bleeding stops",
            "score": 0,
            "status": ""
        },
        {
            "id": 7,
            "question": "Which of the following is a symptom of severe bleeding?",
            "options": [{
                "a": "Pale skin",
                "b": "Dizziness",
                "c": "Rapid breathing",
                "d": "All of the above"
            }],
            "answer": "All of the above",
            "score": 0,
            "status": ""
        },
        {
            "id": 8,
            "question": "When dressing a wound, what should you do if blood seeps through the dressing?",
            "options": [{
                "a": "Apply more dressing on top of the old one",
                "b": "Remove the old dressing and apply a new one",
                "c": "Add a layer of duct tape to hold the dressing in place",
                "d": "None of the above"
            }],
            "answer": "Remove the old dressing and apply a new one",
            "score": 0,
            "status": ""
        },
        {
            "id": 9,
            "question": "What should you do if you suspect internal bleeding in a person?",
            "options": [{
                "a": "Apply pressure to the affected area",
                "b": "Elevate the affected limb",
                "c": "Apply ice to the affected area",
                "d": "Seek medical attention immediately"
            }],
            "answer": "Seek medical attention immediately",
            "score": 0,
            "status": ""
        },
        {
            "id": 10,
            "question": "What is the best way to prevent infection when dressing a wound?",
            "options": [{
                "a": "Use sterile dressing and gloves",
                "b": "Apply alcohol or hydrogen peroxide to the wound",
                "c": "Apply pressure to the wound",
                "d": "None of the above"
            }],
            "answer": "Use sterile dressing and gloves",
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