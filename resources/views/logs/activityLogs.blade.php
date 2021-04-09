@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">{{ __('Activity Logs') }}</div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            @method('DELETE')
            
           <table class="table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Commited By</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->actionLog  }}</td>
                            <td>{{ $log->username }} </td>
                            <td>{{ $log->dateAdded }}</td>
                            <td><button class="btn btn-danger btn-sm" type="submit" id="delete" name="delete">DELETE</button></td>
                        </tr>
                    @endforeach
                    
                </tbody>
           </table>
        
        </form>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            <?php echo $logs->render(); ?>
        </div>
    </div>
</div> 
@endsection
