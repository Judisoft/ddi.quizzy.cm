@include('layouts.dashboard.main')

<div class="container-fluid" style="overflow-x:hidden;">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="uk-margin">
                    <h2 class="main-title">{{ $subject->title }}</h2>
                    <p class="p-2 h5"><i class="icofont-rounded-expand h3"></i> Sort Questions <br> <small>select topic to sort questions</small></p>
                    <div class="uk-form-controls">
                        <div class="uk-child-width-expand@s" uk-grid>
                            <div>
                                <select class="form-control"  id="level" name="level" disabled>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}" class="text-capitalize" >{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <select class="form-control"  id="topic" onchange="sortQuestions()">
                                    <option value="">Select Topic</option>
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->id }}" class="text-capitalize">{{ $topic->topic }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="noItem"></div>
                </div>
                <div id="sorted"></div>
                <div id="toggleQuestions">
                    @forelse ($questions as $key => $question)
                        <div class="d-widget mb-4" style="overflow-wrap: break-word;">
                            <div class="d-widget-title">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <a href="#"><img class="uk-border-circle" width="40" height="40" src="{{ $question->user->profile_photo_url }}" alt="{{ $question->user->name }}"></a>
                                    </div>
                                    <div class="uk-width-expand">
                                        <a href="#"><h5 class="uk-margin-remove-bottom fw-600">{{$question->user->name }} @if($question->user->is_premium == 1)<i class="icofont-check-circled text-primary"></i>@endif</h5></a>
                                        <p class="uk-text-meta uk-margin-remove-top">{{ $question->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="uk-flex uk-flex-right">
                                        <div class="px-2">
                                            <button class="button bg-transparent">
                                                <a href="#modal-center-2"  uk-tooltip="share this question with friends" uk-toggle>
                                                    <i class="icofont-share h3 px-2 fw-700 text-primary"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-widget-content">
                                <div class="d-widget-title">
                                    <div class="uk-flex flex-column">
                                        <div class="">
                                            <h5 class="main-title px-2 uk-underline">{{'Question'.' ' .($key + 1)  }}</h5> <br>
                                        </div>
                                        <div class="pb-3" style="word-wrap: break-word;">
                                            {!! $question->content !!}
                                        </div>
                                    </div>
                                </div>
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
                                <div id="renderAnswer"></div>
                            </div>
                        </div>
                    @empty
                        <tr>No question yet</tr>
                    @endforelse
                    <div style="word-wrap:break-word"> {{ $questions->links('pagination::bootstrap-4') }} </div>
                </div>
                {{-- modal for correct answer --}}
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
            </div>
        </div>
    </div>
</div>
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container mt-4">
            <img src="{{ asset('images/resources/share.svg') }}">
            <div class="mt-3 text-center">{!! $share_btn !!}</div>
        </div>        
    </div>
</div>
<div id="modal-center-2" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container mt-4">
            <h2 class="text-center fw-500 p-2">Share this question</h2>
            <img src="{{ asset('images/resources/share.svg') }}">
            <div class="mt-3 text-center">{!! $share_btn !!}</div>
        </div>        
    </div>
</div>
<script>
    // let topic = document.getElementById("topic")
    let questions = {!! json_encode($questions) !!}
    let toggleQuestions = document.getElementById("toggleQuestions")
    let sorted = document.getElementById("sorted")

    function formatDate(date)
    {
        dayjs.extend(window.dayjs_plugin_relativeTime);
        return dayjs(date).fromNow()
    }


    function displaySortedQuestions(data)
    {
        toggleQuestions.style.display = 'none'

        if(data.length === 0)
        {
            document.getElementById("noItem").innerHTML = `<div class="p-5 text-center mt-5">
                                                                <img class="text-center" src="{{ asset('backend/images/resources/stats4.svg') }}" height="130" width="130">
                                                                <h5 class="opacity-3 pt-3 mb-3">Sorry Couldn't fetch anything ...</h5>
                                                                <a href="${window.location.href}"><button class="button small primary">clear filter</button></a>
                                                            </div>`
        }else {
            document.getElementById("noItem").style.display = 'none'
           
        }
        sorted.innerHTML = ""
        data.map((q, key) => {
            sorted.innerHTML +=`<div class="inline-block p-2" style="overflow-wrap: break-word;">
                                    <h5 class="pb-3"><span class="text-primary text-lowercase">${q.level.name} </span> <i class="icofont-curved-right h5"></i> 
                                    <span class="text-primary text-lowercase">${q.subject.title} </span> <i class="icofont-curved-right h5"></i>
                                    <span class="text-primary text-lowercase">  ${q.topic.topic} </span></h5>
                                    <div class="d-widget mb-4">
                                        <div class="d-widget-title">
                                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                <div class="uk-width-auto">
                                                    <a href="#"><img class="uk-border-circle" width="40" height="40" src="${q.user.profile_photo_url}" alt=""></a>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <a href="#"><h5 class="uk-margin-remove-bottom">${q.user.name}</h5></a>
                                                    <p class="uk-text-meta uk-margin-remove-top">${formatDate(q.created_at)}</p>
                                                </div>
                                                <div class="uk-flex uk-flex-right">
                                                    <button class="button bg-transparent">
                                                        <a href="#modal-center"  uk-toggle>
                                                            <i class="icofont-share h3 px-2 fw-700 text-primary"></i>
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-widget-title">
                                            <div class="uk-flex flex-column">
                                                <div class="p-2">
                                                    <p class="main-title px-2 uk-underline">Question ${key + 1}:</p>
                                                </div>
                                                <div class="p-2">
                                                    ${'<h4>'+q.content+'</h4>'}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabcontent px-5">
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('A', '${q.answer}')" class="option"></div>
                                                    <div class="px-3"><label>${'<h6>'+q.A+'</h6>'}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('B', '${q.answer}')" class="option"></div>
                                                    <div class="px-3"><label>${'<h6>'+q.B+'</h6>'}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('C', '${q.answer}')" class="option"></div>
                                                    <div class="px-3"><label>${'<h6>'+q.C+'</h6>'}</label></div>
                                                </div>
                                            </div>
                                            <div class="uk-margin p-2">
                                                <div class="d-flex flex-row">
                                                    <div onclick="verifyAnswer('D', '${q.answer}')" class="option"></div>
                                                    <div class="px-3"><label>${'<h6>'+q.D+'</h6>'}</label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
        })
    }


    function sortQuestions()
    {
        sorted.innerHTML = `<div class="sp sp-circle"></div>`
        let topicId = document.getElementById("topic").value;
        let levelId = document.getElementById("level").value;
        let subjectId = {!! json_encode($subject_id) !!}

        let quest = questions.data

        axios.get('/questions/subjects/'+subjectId+'/'+topicId, {
        topic_id: topicId,
        subject_id: subjectId,
        })
        .then(function (response) {
            const sortedQuestions = response.data.questions;
            displaySortedQuestions(sortedQuestions)        
        })
        .catch(function (error) {
            // Handle Error here
        });      

    }


    function verifyAnswer(userAnswer, answer) {
       
        if(userAnswer === answer) 
        {
            document.getElementById("btnToggle").click()
            
        } else {
            document.getElementById("btnToggleWrong").click()
        }


    }
</script>