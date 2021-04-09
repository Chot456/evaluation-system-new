<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use App\User;

class EvaluationController extends Controller
{
    public function index()
    {
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
            ->select('*') 
            ->join('users', 'users.id', '=', 'employee_to_evaluate.employee_id')
            ->paginate(10);

        $schoolYears = DB::table('school_year')
            ->select('*')
            ->get();

        $semesters = DB::table('semester')
            ->select('*')
            ->get();

        return view('evaluation.evaluation', compact('user', 'userOptions', 'usersToEvaluates', 'schoolYears', 'semesters'));
    }

    public function store(Request $request)
    {
        $current_user_id = Auth::user()->id;

        // insert in activity log
        \App\activityLog::create([
            'action' => 'user with the id of'. ' '. $request['employee_id'] .' ' .'was added for evaluation' ,
            'user_id' => $current_user_id
        ]);

        try 
        {
            $checkIfExist = DB::table('employee_to_evaluate')
            ->select('*') 
            ->where('employee_id', '=', $request->employee_id)
            ->get();

            // check if data exist in db
            if (!$checkIfExist->isEmpty()) {
                return redirect()->back()->with(['success', 'Failed! Duplicate enrties of employee']);
            }
            
            $aRes = \App\employee_to_evaluate::create([
                'employee_id' => $request['employee_id'],
                'school_year_id' => $request['school_year_id'],
                'semester_id' => $request['semester_id'],
                'evaluated_by' => $current_user_id
            ]);
            

            } catch (Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];

                return redirect()->back()->withErrors(['message', $errorCode]);
            }
            return redirect()->back()->with('success', 'Successfully Added!');
    }

    public function showEvaluationForm($evaluator_id, $employee_id, $evaluate_id)
    {
        $evaluator_info = User::findOrFail($evaluator_id);
        $employee_info = User::findOrFail($employee_id);
        $sEvaluate_id = $evaluate_id;

        $questionaires = \App\questionaire::All();
        return view('evaluation.evaluationForm', compact('questionaires', 'evaluator_info', 'employee_info', 'sEvaluate_id'));
    } 

}
