@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">User Information</div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>User: </td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $user->email }}</td>
                </tr>
            </table>   
        </div>
    </div> 
</div>    
@endsection
