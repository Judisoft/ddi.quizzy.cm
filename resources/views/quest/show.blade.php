@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="title-content d-widget-title">
                    <p class="main-title fw-400 text-capitalize">
                        {{ $question->level->name }} <i class="icofont-arrow-right"></i> 
                        {{ $question->subject->title }} <i class="icofont-arrow-right"></i> 
                        <a href="{{ route('topic.questions', $question->topic) }}">{{ $question->topic->topic }}</a>
                    </p>
                </div>	                
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        <div id="question">
                            <div class="d-widget d-widget-title p-3" style="border-radius: 10px;border:1px solid #c2c2de;">
                                <h3 class="main-title" style="line-height: 48px; word-wrap:break-word;">Question: {!! $question->content !!}</h3>
                                <div class="tabcontent px-5">
                                    <div class="uk-margin p-2">
                                        <div class="d-flex flex-row">
                                            <div onclick="verifyAnswer('A', '{{ $question->answer }}')" class="option"></div>
                                            <div class="px-3"><label class="">{!! $question->A !!}</label></div>
                                        </div>
                                    </div>
                                    <div class="uk-margin p-2">
                                        <div class="d-flex flex-row">
                                            <div onclick="verifyAnswer('B', '{{ $question->answer }}')" class="option"></div>
                                            <div class="px-3"><label class="">{!! $question->B !!}</label></div>
                                        </div>
                                    </div>
                                    <div class="uk-margin p-2">
                                        <div class="d-flex flex-row">
                                            <div onclick="verifyAnswer('C', '{{ $question->answer }}')" class="option"></div>
                                            <div class="px-3"><label class="">{!! $question->C !!}</label></div>
                                        </div>
                                    </div>
                                    <div class="uk-margin p-2">
                                        <div class="d-flex flex-row">
                                            <div onclick="verifyAnswer('D', '{{ $question->answer }}')" class="option"></div>
                                            <div class="px-3"><label class="">{!! $question->D !!}</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="renderAnswer"></div>
                        <div class="d-flex justify-content-between">
                            <div class="p-2">
                                <button class="button light" id="previousBtn" onclick="getPreviousQuestion({{ $question->topic->id }}, {{ $question->subject->id }}, {{ $question->id }})"><i class="icofont-caret-left"></i> Previous</button>
                            </div>
                            <div class="p-2">
                                <button class="button light" id="nextBtn" onclick="getNextQuestion({{ $question->subject->id }}, {{ $question->topic->id }}, {{ $question->id }})">Next <i class="icofont-caret-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
<button class="button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #correct-answer" id="btnToggle" style="display:none"></button>
<div id="correct-answer" class="uk-flex-top bg-light" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="text-center">
            <img src="{{ asset('images/resources/right-decision.gif') }}" style="height:75px;width:75px;">
            <h4 class="p-5 fw-700">Correct Answer</h4>
            <p>Great Job {{ Auth::user()->name }}!</p>
        </div>
    </div>
</div>
{{-- Modal for wrong answer --}}
<button class="button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #wrong-answer" id="btnToggleWrong" style="display:none"></button>
<div id="wrong-answer" class="uk-flex-top bg-light" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="text-center">
            <img src="{{ asset('images/resources/wrong-decision.gif') }}" style="height:75px;width:75px;">
            <h4 class="p-5 fw-700">Wrong Answer</h4>
            <button type="button" class="button light uk-modal-close" >Try again</button>
        </div>
    </div>
</div>

<script>
    let question = document.getElementById("question")
    let questionCount = 0

    function verifyAnswer(userAnswer, answer) {

        if(userAnswer === answer) 
        {
            document.getElementById("btnToggle").click()
            
        } else {
            document.getElementById("btnToggleWrong").click()
        }

    }

    function getNextQuestion(subjectId, topicId, runningQuestionId) {
        question.innerHTML = `<div class="sp sp-circle"></div>`

        questionCount++
        
        axios.get('/quest/'+subjectId+'/'+topicId+'/next/'+runningQuestionId, {
        })
        .then(function (response) {
            
            if(questionCount < response.data.next_question.length) {
                let nextQuestion = response.data.next_question[questionCount];
                question.innerHTML = `<div class="d-widget d-widget-title p-3" style="border-radius: 10px;border:1px solid #c2c2de;">
                                        <h3 class="main-title" style="line-height: 48px; word-wrap:break-word;">Question: ${nextQuestion.content}</h3>
                                        <div class="tabcontent px-5">
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('A', '${nextQuestion.answer}')" class="option"></div>
                                                    <div class="px-3"><label class="">${nextQuestion.A}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('B', '${nextQuestion.answer}')" class="option"></div>
                                                    <div class="px-3"><label class="">${nextQuestion.B}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('C', '${nextQuestion.answer}')" class="option"></div>
                                                    <div class="px-3"><label class="">${nextQuestion.C}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('D', '${nextQuestion.answer}')" class="option"></div>
                                                    <div class="px-3"><label class="">${nextQuestion.D}</label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
                } else {
                   document.getElementById("nextBtn").style.display = 'none'
                   document.getElementById("previousBtn").style.display = 'block'
                }
        })
        .catch(function (error) {
        });
    }
    

    function getPreviousQuestion(topicId, subjectId, runningQuestionId) {
        question.innerHTML = `<div class="sp sp-circle"></div>`
        questionCount--
        axios.get('/quest/'+subjectId+'/'+topicId+'/previous/'+runningQuestionId, {
        })
        .then(function (response) {
            if(Math.abs(questionCount) < response.data.previous_question.length) {
                console.log(response)
            console.log(questionCount)
            console.log(response.data.previous_question.length)
            let previousQuestion = response.data.previous_question[Math.abs(questionCount)];
            // runningQuestionId = previousQuestion.id
            question.innerHTML = `<div class="d-widget d-widget-title p-3" style="border-radius: 10px;border:1px solid #c2c2de;">
                                    <h3 class="main-title" style="line-height: 48px; word-wrap:break-word;">Question: ${previousQuestion.content}</h3>
                                    <div class="tabcontent px-5">
                                        <div class="uk-margin p-2">
                                            <div class="d-flex flex-row">
                                                <div onclick="verifyAnswer('A', '${previousQuestion.answer}')" class="option"></div>
                                                <div class="px-3"><label class="">${previousQuestion.A}</label></div>
                                            </div>
                                        </div>
                                        <div class="uk-margin p-2">
                                            <div class="d-flex flex-row">
                                                <div onclick="verifyAnswer('B', '${previousQuestion.answer}')" class="option"></div>
                                                <div class="px-3"><label class="">${previousQuestion.B}</label></div>
                                            </div>
                                        </div>
                                        <div class="uk-margin p-2">
                                            <div class="d-flex flex-row">
                                                <div onclick="verifyAnswer('C', '${previousQuestion.answer}')" class="option"></div>
                                                <div class="px-3"><label class="">${previousQuestion.C}</label></div>
                                            </div>
                                        </div>
                                        <div class="uk-margin p-2">
                                            <div class="d-flex flex-row">
                                                <div onclick="verifyAnswer('D', '${previousQuestion.answer}')" class="option"></div>
                                                <div class="px-3"><label class="">${previousQuestion.D}</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
            } else {
                document.getElementById("previousBtn").style.display = 'none'
                document.getElementById("nextBtn").style.display = 'block'

            }
            
        })
        .catch(function (error) {
        });
    }
</script>
