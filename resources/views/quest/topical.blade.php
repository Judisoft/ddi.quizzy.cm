@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="title-content d-widget-title">
                    <h2 class="main-title fw-700 text-capitalize">
                        {{ $topic->topic }}
                    </h2>
                </div>	                
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        @foreach ($questions as $key=>$question)
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
                        @endforeach
                        <div id="renderAnswer"></div>
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
    function verifyAnswer(userAnswer, answer) {

        if(userAnswer === answer) 
        {
            document.getElementById("btnToggle").click()
            
        } else {
            document.getElementById("btnToggleWrong").click()
        }

    }
</script>
