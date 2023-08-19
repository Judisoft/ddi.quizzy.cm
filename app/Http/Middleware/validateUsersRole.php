<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class validateUsersRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $acceptedRoles = ['admin', 'teacher', 'staff'];
        if (!in_array(Auth::user()->user_role, $acceptedRoles)) {
            $errorMsg = 'Only a teacher, Quizzy Staff or Admin can create resources. To create a quiz, add questions or set an evaluation, please contact us';
            return back()->with('error', $errorMsg);
       }
        return $next($request);
    }
}
