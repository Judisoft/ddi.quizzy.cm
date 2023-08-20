<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;
use Auth;

class QuestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['alter.question'])->only(['edit', 'destroy']);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_questions = Question::where('user_id', Auth::user()->id)->orderBy('subject_id', 'DESC')->Paginate(50);
        return view('quest.index', compact('user_questions'));
    }

    public function getAll(Request $request)
    {
        $search = $request->input('search');

        if($search) {
            $user_questions = Question::where('content', 'like', '%'.$search.'%')->paginate(100);
        } else {
            $user_questions = Question::orderBy('subject_id', 'DESC')->Paginate(100);
        }
        return view('quest.all-questions', compact('user_questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('quest.create', compact('levels', 'subjects', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'nullable',
            'D' => 'nullable',
            'answer' => 'required',
            'level' => 'required',
            'subject' => 'required',
            'topic' => 'required'
        ],
        [
            'content.required' => 'Please enter the question',
            // 'content.unique' => 'This question already exist',
            'A.required' => 'Enter option A',
            'B.required' => 'Enter option B',
            'level.required' => 'Level is required',
            'subject.required' => 'Subject is required',
            'topic.required' => 'Topic is required'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
    
        } else {
            // save questions
            $question = new Question;
            $question->content = $request->content;
            $question->A = $request->input('A');
            $question->B = $request->input('B');
            $question->C = $request->input('C');
            $question->D = $request->input('D');
            $question->answer = $request->input('answer');
            $question->points = !empty($request->input('points')) ? $request->input('points') : 1;
            $question->duration = !empty($request->input('duration')) ? $request->input('duration') : 108;
            $question->user_id = Auth::user()->id;
            $question->subject_id = $request->input('subject');
            $question->topic_id = $request->input('topic');
            $question->level_id = $request->input('level');

            $question->save();

            return redirect()->back()->with('success', 'Question created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('quest.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $levels = Level::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        return view('quest.edit', compact('question', 'levels', 'subjects', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'A' => 'required',
            'B' => 'required',
            'answer' => 'required',
            'level' => 'required',
            'subject' => 'required',
            'topic' => 'required'
        ],
        [
            'content.required' => 'Please enter the question',
            // 'content.unique' => 'This question already exist',
            'A.required' => 'Enter option A',
            'B.required' => 'Enter option B',
            'level.required' => 'Level is required',
            'subject.required' => 'Subject is required',
            'topic.required' => 'Topic is required'
        ]);

        if ($validator->fails())
        {
            return back()->with('error', 'Something went wrong, check the form');
    
        } else {
            // save questions
            $question = Question::find($id);
            $question->content = $request->content;
            $question->A = $request->input('A');
            $question->B = $request->input('B');
            $question->C = $request->input('C');
            $question->D = $request->input('D');
            $question->answer = $request->input('answer');
            $question->points = !empty($request->input('points')) ? $request->input('points') : 1;
            $question->duration = !empty($request->input('duration')) ? $request->input('duration') : 108;
            $question->user_id = Auth::user()->id;
            $question->subject_id = $request->input('subject');
            $question->topic_id = $request->input('topic');
            $question->level_id = $request->input('level');

            if ($question->user_id == Auth::user()->id) {

                $question->update();
                return back()->with('success', 'Question updated successfully');
            } else {
                return back()->with('error', 'You do not have permission to update this question');
            }

            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return back()->with('success', 'Question deleted');
    }


    public function topics(Topic $topic) {
        $topic_id = $topic->id;
        $questions = Question::where('topic_id', $topic_id)->paginate(50);
        return view('quest.topical', compact('questions', 'topic'));
    }

    // Get next question

    public function getNextQuestion($sub_id, $topic_id, $question_id) {
        
        $next_question = Question::where('subject_id', $sub_id)
                                  ->where('topic_id', $topic_id)
                                  ->where('id', '>=', $question_id)
                                  ->get();
                                //   ->get();
        return response()->json([
            'next_question' => $next_question
        ]);
    }


    // Get previous question

    public function getPreviousQuestion($sub_id, $topic_id, $question_id) {
        $previous_question = Question::where('subject_id', $sub_id)
                                  ->where('topic_id', $topic_id)
                                  ->where('id', '<=', $question_id)
                                  ->orderBy('id', 'DESC')
                                  ->get();
        return response()->json([
            'previous_question' => $previous_question
        ]);
    }

}
