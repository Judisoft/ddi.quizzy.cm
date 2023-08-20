@include('layouts.dashboard.main')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content uk-margin">
                <h4 class="main-title">Bookmarks</h1>                
                <div class="row  mb-4">
                    @forelse ($user_bookmarks as $bookmark)
                        <div class="col text-center">
                            <a href="{{ route('display.quiz', $bookmark->quiz) }}">
                                <i class="icofont-folder px-2" style="font-size:78px;color:#00B2FF;"></i>
                                <p class="fw-500" style="line-height:15px;">
                                    {{ $bookmark->quiz->title }} <br>
                                    <small class="text-primary">{{ $bookmark->quiz->questions->count() }} {{ Str::plural('question', $bookmark->quiz->questions->count()) }}</small>
                                </p>
                            </a>
                        </div>
                    @empty
                    <p class="text-center pl-5">No bookmarks</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->