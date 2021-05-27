@extends('layout.main')
@section('judul','Accounts')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>Edit Account</h3>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route("accounts.update", $account->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$account->name}}" required>
                        </div>
                        <div class="col">
                            <label for="">Username</label>
                          <input type="text" class="form-control" value="{{$account->username}}" name="username" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Email</label>
                          <input type="email" class="form-control" value="{{$account->email}}" name="email" required>
                        </div>
                        <div class="col">
                            <label for="">NBI</label>
                          <input type="number" class="form-control" value="{{$account->nbi}}" name="nbi" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                        <div class="col">
                            <label for="">Upload Photo Profile</label>
                          <input type="file" class="form-control" name="profile_photo_path">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="">Role</label>
                            <select name="roleId" class="form-control">
                                @foreach($roles as $key => $role)
                                    <option value="{{$key}}" {{$role == $account->roles->pluck('name')[0] ? 'selected' : ''}}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <a href="{{route('accounts.index')}}" class="btn btn-danger mt-2">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection