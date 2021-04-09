@extends('layouts.app')

@section('content')

@if(Auth::user()->role === 'Admin')  
    <div class="card">
        <div class="card-header" style="color: #eeeeee; background-color: #343A40">Dashboard</div>
        <div class="card-body">
            @if (session('status'))

                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info" style="color:white">
                          Student
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total {{ $studentCount }}</h5>
                          <a href="user">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success" style="color:white">
                            Professor
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Total: {{  $professorCount }}</h5>
                          <a href="user">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-danger" style="color:white">
                          Dean
                        </div>
                        <div class="card-body">
                          <h5 class="card-title text-">Total: {{ $deanCount }}</h5>
                          <a href="user">View</a>
                        </div>
                    </div>
                </div>

               <div class="col-md-12" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-header">Filter by</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="faculty">Department</label>
                                            <select class="form-control">
                                            <option>IT</option>
                                            <option>BA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="faculty">School Year</label>
                                            <select class="form-control">
                                            <option>2020</option>
                                            <option>2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="faculty">Semester</label>
                                            <select class="form-control">
                                            <option>1st sem</option>
                                            <option>2nd sem</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>

                <div class="col-md-12" style="margin-top: 30px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Answer 1</th>
                                <th>Answer 2</th>
                                <th>Answer 3</th>
                                <th>Answer 4</th>
                                <th>Answer 5</th>
                                <th>Answer 6</th>
                                <th>Answer 7</th>
                                <th>Answer 8</th>
                                <th>Answer 9</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluation_summary as $summary)
                            <tr>
                                <td>{{ $summary->question1 }}</td>
                                <td>{{ $summary->question2 }}</td>
                                <td>{{ $summary->question3 }}</td>
                                <td>{{ $summary->question4 }}</td>
                                <td>{{ $summary->question5 }}</td>
                                <td>{{ $summary->question6 }}</td>
                                <td>{{ $summary->question7 }}</td>
                                <td>{{ $summary->question8 }}</td>
                                <td>{{ $summary->question9 }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            
            </div>
            
        </div>
    </div>    
@else
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary" style="color: white">EVALUATOR INFORMATION</div>
                    <div class="card-body">
                        <p class="card-text">ID: {{ $user->id }} </p>
                        <p class="card-text">Student Name: {{ $user->name }}</p>
                        <p class="card-text">No. of instructor: {{ $usersToEvaluates->count() }}</p>
                        <p class="card-text">ID: {{ $user->id }} </p>
                        <p class="card-text">Course: BSIT</p>
                        <p class="card-text">Year/Section: 2nd Year, SEC100</p>
                    </div>
                  </div>
            </div>
        </div>

        <div class="card" style="margin-top: 20px">
            <h5  class="card-text" style="padding: 30px;">LIST OF EMPLOYEES TO BE EVALUATED</h5>
            <div class="col-lg-12">
                <table class="table">
                    <colgroup>
                        <col span="1" style="width: 75%;">
                        <col span="1" style="width: 25%;">
                     </colgroup>

                    <thead>
                        <th>Employee Info</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                        @forelse($usersToEvaluates as $userToEvaluates)
                        <tr>
                            <td>
                                {{ $userToEvaluates->name }}
                            </td>
                            <td>
                                
                                <?php
                                    $evaluator_id = $user->id; 
                                    $employee_id = $userToEvaluates->user_id;
                                    $evaluation_id = $userToEvaluates->evaluation_id;
                                ?>
                                {{-- <a href="showEvaluationForm" class="btn btn-primary" type="submit">EVALUATE</button> --}}
                            <a href="{{ url('showEvaluationForm/'.$evaluator_id.'/'.$employee_id.'/'.$evaluation_id.'/') }}" class="btn btn-primary" type="submit">EVALUATE</button>
                            </td>
                        </tr>
                        @empty
                        <tr> No data </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
            
    
@endif  
@endsection
