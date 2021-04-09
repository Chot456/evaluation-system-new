@extends('layouts.app')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
@if(session()->has('errormgs'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('errormgs') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

<div class="card">
    <div class="card-header">{{ __('Edit Questionaire') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('updateQuestion', ['id' => $questionId->id]) }}">
            @csrf
            @method('PATCH')
            
            <div class="form-group row">
               
                <label for="name" class="col-md-4 col-form-label text-md-right">Question</label>
                <div class="col-md-6">
                    <input id="question" type="text" class="form-control" name="question"  value="{{ $questionId->question }}" autocomplete="name" required>
                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> 
@endsection
