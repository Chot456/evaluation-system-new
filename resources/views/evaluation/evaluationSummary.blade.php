@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">Evaluation Summary</div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-ligth">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">School Year</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluations as $evaluation)
                            <tr>
                                <th scope="row"> {{ $evaluation->evaluation_summary_id }}</th>
                                <td>{{ $evaluation->employee_name }}</td>
                                <td>{{ $evaluation->year_desc }}</td>
                                <td>{{ $evaluation->sem_desc }}</td>
                                <td>{{ $evaluation->publish }}</td>
                                <td><a href="{{ route('showEvaluationRecord', ['id' => $evaluation->evaluation_summary_id ]) }}" class="btn btn-primary">VIEW</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>  
    </div>
</div>  

@endsection
