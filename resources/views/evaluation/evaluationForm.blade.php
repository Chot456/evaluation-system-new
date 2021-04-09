@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('createEvaluationSummary') }}">
    @csrf
    <div class="card">
    <div class="card-header">Evaluation Form</div>
        <div class="card-body">
            <table class="table">
                <colgroup>
                    <col span="1" style="width: 20%;">
                    <col span="1" style="width: 70%;">
                 </colgroup>
                
                 <tbody>
                     
                    <tr>
                        <td>Student Number:</td>
                        <td>
                            PM1000
                            <input type="text" name="evaluation_id" id="evaluation_id" value="{{ $sEvaluate_id }}" hidden>
                        </td>
                    </tr>
                    <tr>
                        <td>Student Name:</td>
                        <td>
                            {{ $evaluator_info->name }}
                            <input type="text" name="evaluator_id" id="evaluator_id" value="{{ $evaluator_info->id }}" hidden>
                        </td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td>
                            BSIT
                        </td>
                    </tr>
                    <tr>
                        <td>Year/Section:</td>
                        <td>
                            2nd Year/ SEC100
                        </td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td>
                            <?php
                                $now = date("Y/m/d"); 
                                echo $now;
                            ?>
                            <input type="text" id="date_evaluated" name="date_evaluated" value="{{ $now }}" hidden>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Instructor:</td>
                        <td>{{ $employee_info->name }}</td>
                        <input type="text" name="employee_evaluated_id" id="employee_evaluated_id" value="{{ $employee_info->id }}" hidden>
                    </tr>
                    <tr>
                        <td>Subject:</td>
                        <td>Programming</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-body">
            <div class="card">
                    <div class="card-body">
                            <h3>Evaluation</h3>
                            <div class="card-text" style="padding: 30px 5px 30px 5px ">
                                NOTE: Enter rating from 0 to 10
                            </div>
                            <table class="table">
                                <colgroup>
                                    <col span="1" style="width: 9%;">
                                    <col span="1" style="width: 70%;">
                                    <col span="1" style="width: 30%;">
                                </colgroup>

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Input</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    @foreach($questionaires as $questionaire)
                                    <tr>
                                        <th scope="row">{{ $questionaire->id }}</th>
                                        <td>{{ $questionaire->question }}</td>
                                        <td>
                                            <input type="number" min="0" max="10" class="form-control" name="question<?php echo $questionaire->id; ?>" id="question<?php echo $questionaire->id; ?>">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="comment">Comment/Suggestions: </label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                    </div>
                </div>           
            </div>  
        </div>
</div>  
</form> 
@endsection
