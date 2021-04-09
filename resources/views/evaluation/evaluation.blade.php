@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">Evaluation</div>

    
    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="{{ route('addEmployeeToEvaluate') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">ADD EMPLOYEES TO BE EVALUATED</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="employee_id">Select Employee</label>
                                    <select class="form-control" name="employee_id" id="employee_id">
                                        @forelse($userOptions as $userOption)
                                        <option value="{{ $userOption->id }}">{{ $userOption->name }}</option>
                                        @empty
                                        <option> No data </option> 
                                        @endforelse
                                    </select>
                                    <label for="school_year_id">School Year</label>
                                    <select class="form-control" name="school_year_id" id="school_year_id">
                                        @foreach ($schoolYears as $schoolYear)
                                            <option value="{{ $schoolYear->id }}">{{ $schoolYear->yearDescription }}</option>
                                        @endforeach
                                    </select>
                                    <label for="semester_id">Semester</label>
                                    <select class="form-control" name="semester_id" id="semester_id">
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->semesterDescription }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>    
                        </div>
                    </form>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">LIST OF EMPLOYEES TO BE EVALUATED</div>
                        <div class="card-body">
                            <table class="table">
                                <colgroup>
                                    <col span="1" style="width: 70%;">
                                    <col span="1" style="width: 20%;">
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
                                            <button class="btn btn-danger" type="submit">DELETE</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr> No data </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <?php echo $usersToEvaluates->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
    </div>
</div>  
 
@endsection
