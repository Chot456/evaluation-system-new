@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">Evaluation Summary</div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="" style="margin-bottom: 30px">
                        <p class="card-text">Propesor name: {{ $evaluations_join_with_employee[0]->name }}</p>
                        <p class="card-text">School year: {{ $evaluations_join_with_employee[0]->yearDescription }}</p>
                        <p class="card-text">Semester year: {{ $evaluations_join_with_employee[0]->semesterDescription }}</p>
                        <p class="card-text">Role: {{ $evaluations_join_with_employee[0]->role }}</p>
                        <p class="card-text">Publish: {{ $evaluations_join_with_employee[0]->publish }}</p>
                        <hr>
                        <p class="card-text">Evaluator by: {{ $evaluator[0]->name }} </p>
                    </div>

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $questions[0]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question1 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[1]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question2 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[2]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question3 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[3]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question4 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[4]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question5 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[5]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question6 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[6]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question7 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[7]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question8 }}  </td>
                            </tr>
                            <tr>
                                <td>{{ $questions[8]->question }}</td>
                                <td> {{ $evaluations_join_with_employee[0]->question9 }}  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>  
    </div>
</div>  

@endsection
