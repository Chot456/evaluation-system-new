<?php

namespace App\Http\Controllers\ActivityLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    public function index() 
    {
        // $logs = \App\activityLog::all();
        $logs = DB::table('activity_log')
        ->select('activity_log.id','activity_log.action as actionLog', 'users.name as username', 'activity_log.created_at as dateAdded') 
        ->join('users', 'users.id', '=', 'activity_log.user_id')
        ->paginate(10);
        return view('logs.activityLogs', compact('logs'));
    }
}
