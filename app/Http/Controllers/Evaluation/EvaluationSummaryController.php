<?php

namespace App\Http\Controllers\Evaluation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use App\User;

class EvaluationSummaryController extends Controller
{
    public function index() 
    {
        $evaluations = DB::table('evaluation_summary')
        ->select('evaluation_summary.id as evaluation_summary_id', 'users.name as employee_name', 'school_year.yearDescription as year_desc', 'semester.semesterDescription as sem_desc', 'evaluation_summary.publish as publish') 
        ->join('users', 'evaluation_summary.employee_evaluated_id', '=', 'users.id')
        ->leftjoin('employee_to_evaluate', 'evaluation_summary.evaluation_id', '=', 'employee_to_evaluate.id')
        ->leftjoin('school_year', 'employee_to_evaluate.school_year_id', '=', 'school_year.id')
        ->leftjoin('semester', 'employee_to_evaluate.semester_id', '=', 'semester.id')
        ->get();
        
        return view('evaluation.evaluationSummary', compact('evaluations'));
    }

    public function show($id) 
    {
        $evaluations_join_with_employee = DB::table('evaluation_summary')
        ->select('*') 
        ->join('users', 'evaluation_summary.employee_evaluated_id', '=', 'users.id')
        ->leftjoin('employee_to_evaluate', 'evaluation_summary.evaluation_id', '=', 'employee_to_evaluate.id')
        ->leftjoin('school_year', 'employee_to_evaluate.school_year_id', '=', 'school_year.id')
        ->leftjoin('semester', 'employee_to_evaluate.semester_id', '=', 'semester.id')
        ->where('evaluation_summary.id', $id)
        ->get();

        $evaluator = DB::table('evaluation_summary')
        ->select('*')
        ->join('users', 'evaluation_summary.evaluator_id', 'users.id')
        ->where('evaluation_summary.id', $id)
        ->get();

        $questions = DB::table('questionaire')
        ->select('*')
        ->get();

        return view('evaluation.showEvaluation', compact('evaluations_join_with_employee', 'evaluator', 'questions'));
    }

    /**
     * create evaluation summary
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_evaluated_id'=>'required',
            'evaluation_id'=>'required',
            'evaluator_id'  => 'required'
        ]);

        try 
        {
            $aRes = \App\evaluation_summary::create([
                'employee_evaluated_id' => $request['employee_evaluated_id'],
                'evaluation_id' => $request['evaluation_id'],
                'evaluator_id' => $request['evaluator_id'],
                'date_evaluated' => $request['date_evaluated'],
                'publish' => 'yes',
                'rating' => $request['rating'],
                'question1' => $request['question1'],
                'question2' => $request['question2'],
                'question3' => $request['question3'],
                'question4' => $request['question4'],
                'question5' => $request['question5'],
                'question6' => $request['question6'],
                'question7' => $request['question7'],
                'question8' => $request['question8'],
                'question9' => $request['question9'],
                'comment' => $request['comment'],
            ]);
            
            // update employee_to_evaluate set evaluated
            $res = \App\employee_to_evaluate::findOrFail($request['evaluation_id']);
            $res->evaluated_by = $request['evaluator_id'];
            $res->save();

             // insert in activity log
            \App\activityLog::create([
                'action' => 'user with the id of'. ' '. $request['employee_id'] .' ' .'was evaluated' ,
                'user_id' => $request['evaluator_id'],
            ]);
            
            } catch (Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];

                return redirect()->back()->withErrors(['message', $errorCode]);
            }

            return redirect('/home')->with('success', 'Successfully submited!');
    }
}
