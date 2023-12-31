@include('layouts.dashboard.main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <div class="title-content">
                    <h2 class="main-title fw-700">MCQ Question Bank</h4>
                    <form method="GET" action="{{route('all.questions')}}" class="search-box float-right">
                        <input type="text" name="search" placeholder="search">
                        <button type="submit"><i class="icofont-search"></i></button>
                    </form>
                </div>	                
                <div class="row merged20 mb-4">
                    <div class="col-lg-12">
                        <div class="">
                            <div class="d-widget-title">
                                <a href="{{ route('create.question') }}"><button class="button primary circle float-right">add question</button></a>
                            </div>
                            <table class="table-default table table-striped table-responsive-md">
                                @if($user_questions->count() > 0)
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Question</th>
                                            <th>Subject</th>
                                            <th>Topic</th>
                                            <th>Del/Edit</th>
                                        </tr>
                                    </thead>
                                @endif
                                <tbody>
                                    @forelse ($user_questions as $key => $question)
                                    <tr>
                                        <td>
                                            <figure><img alt="" src="images/resources/user.png"></figure>
                                            <h5>{{ $key + 1 }}</h5>
                                        </td>
                                        <td class="text-left"><a href="{{ route('show.question', $question->id) }}">{!! $question->content !!}</a></td>
                                        <td>{{ $question->subject->title }}</td>
                                        
                                        <td><a href="{{ route('topic.questions', $question->topic) }}" class="text-capitalize">{{ $question->topic->topic }}</a></td>
                                        <td>
                                            <div class="uk-flex justify-content-around">
                                                <div class="p-1">
                                                    <a href="{{ route('edit.question', $question->id) }}" class="button small soft-primary"><i class="icofont-pen-alt-1"></i></a>
                                                </div>
                                                <div class="p-1">
                                                    <form action="{{ route('delete.question', $question->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="sumit" class="button small soft-danger" onclick='return confirm("Are you sure you want to delete this question?")'><i class="icofont-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="text-center">No question available</p>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="text-center mt-4">
                                {{ $user_questions->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
