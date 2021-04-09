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
    <div class="card-header" style="color: #eeeeee; background-color: #343A40">User Management</div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                  <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                  <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
              </div>
            </nav>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a href="showAddUser" type="button" class="btn btn-primary">ADD USER</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <th scope="row"><a href="{{ route('users', ['id' => $user->id ]) }}"> {{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ route('editUser', ['id' => $user->id ],'edit') }}'">EDIT</button>
                            <form method="POST" action="{{ route('deleteUser', ['id' => $user->id ]) }}">
                                
                                @method('DELETE')
                                @csrf
                            <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <li> No data </li>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?php echo $users->render(); ?>
            </div>
        </div>
    </div>
</div>  
@endsection
