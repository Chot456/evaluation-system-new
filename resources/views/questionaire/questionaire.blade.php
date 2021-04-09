@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">Questionaire</div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($questionaires as $questionaire)
                    <tr>
                        <th scope="row"><a href="{{ route('users', ['id' => $questionaire->id ]) }}"> {{ $questionaire->id }}</th>
                        <td>{{ $questionaire->question }}</td>
                        <td>
                            <a href="{{ route('editQuestionaire', ['id' => $questionaire->id ]) }}" class="btn btn-primary">EDIT</a>
                        </td>
                    </tr>
                    @empty
                    <li> No data </li>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection
