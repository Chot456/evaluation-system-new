<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = \App\User::findOrFail(Auth::user()->id);
        
        // $userToEvaluation = \App\User::where('role', 'teacher');

        $user = \App\User::findOrFail(Auth::user()->id);
        $current_user_id = Auth::user()->id;
        
        // $userToEvaluation = \App\User::where('');
        $userOptions = DB::table('users')
            ->select('*') 
            ->where('role', '!=' ,'Student')
            ->where('id', '!=', $current_user_id)
            ->where('role', '!=', 'Admin')
            ->get();

        $usersToEvaluates = DB::table('employee_to_evaluate')
            ->select('employee_to_evaluate.id AS evaluation_id', 'users.name', 'users.id AS user_id') 
            ->join('users', 'users.id', '=', 'employee_to_evaluate.employee_id')
            ->where('employee_to_evaluate.evaluated_by', '!=' , $current_user_id)
            ->get();

        $studentList = \App\User::where('role', '=', 'Student')->get();
        $studentCount = $studentList->count();

        $professorList = \App\User::where('role', '=', 'Professor')->get();
        $professorCount = $professorList->count();

        $deanList = \App\User::where('role', '=', 'Dean')->get();
        $deanCount = $deanList->count();

        $evaluation_summary = \App\evaluation_summary::all();

        return view('home', compact('user', 'userOptions', 'usersToEvaluates', 'studentCount', 'professorCount', 'deanCount', 'evaluation_summary'));
    }
}
