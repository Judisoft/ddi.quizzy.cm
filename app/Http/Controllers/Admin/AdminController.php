<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Question;
use App\Models\UserQuestion;
use App\Models\Answer;
use App\Models\Score;
use Auth;
use DB;
use App\Mail\AccountStatusUpgraded;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function getDashboard()
    {
        $users = User::all();
        $recently_joined = User::where('created_at', '<', Carbon::now())->take(5);
        $premium_users = User::where('is_premium', 1)->get();
        $verified_accounts = User::where('email_verified_at', null)->get();
        $unverified_accounts = User::where('email_verified_at', '<>', null)->get();
        $users_status = Payment::paginate(100);
        $users_chart = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count', 'month_name');

        $labels = $users_chart->keys();
        $data = $users_chart->values();

        //get number of questions per subject

        $bio_quest = Question::where('subject_id', 1);
        $chem_quest = Question::where('subject_id', 2);
        $phy_quest = Question::where('subject_id', 5);
        $gen_know_quest = Question::where('subject_id', 4);
        $french_quest = Question::where('subject_id', 3);

        // Earnings within last 24hrs
        $today_earning = Payment::where('created_at', '>=', Carbon::now()->subDay())->get()->sum('amount');
        // Get earning within the last 7 days

        $last_seven_todays_earning = Payment::where('created_at', '>=', Carbon::now()->subDays(7))->get()->sum('amount');

        //get last month earning
        $last_month_earning = Payment::where('created_at', '>=', Carbon::now()->subDays(30))->get()->sum('amount');

        // User questions stats

        $total_questions = UserQuestion::count();
        $questions_answered = Answer::select('user_question_id')->distinct()->get()->count();
        $questions_unanswered = $total_questions - $questions_answered;
        // $top_three= Score::orderBy('score', 'desc')->take(3);
        $weekly_top_three = Score::whereDate('created_at', '>=', Carbon::now()->startOfWeek()->format('Y-m-d H:i:s'))
                                ->whereDate('created_at', '<=', Carbon::now()->endOfWeek()->format('Y-m-d H:i:s'))->take(3)
                                ->orderBy('score', 'desc')->get();
        

        return view('admin.dashboard', compact(
            'users', 
            'recently_joined', 
            'premium_users',
            'verified_accounts',
            'unverified_accounts',
            'users_status',
            'bio_quest',
            'chem_quest',
            'phy_quest',
            'gen_know_quest',
            'french_quest',
            'today_earning',
            'last_seven_todays_earning',
            'last_month_earning',
            'total_questions',
            'questions_answered',
            'questions_unanswered',
            'weekly_top_three',
            'data',
            'labels'
            ));
    }

    public function upgradeUserPlan($id)
    {
        $user = User::find($id);
        if (Auth::user()->user_role != 'admin') // check if user is admin
        {
            abort(403); // abort if user is not admin
        }
        $user->is_premium = 1;

        $user->save();

        Mail::to(Auth::user())->send(new AccountStatusUpgraded($user));

        return redirect()->back()->with('success', Auth::user()->name.': Account set to premium with success');
    }
}
