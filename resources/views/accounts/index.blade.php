@extends('layout.main')
@section('judul','Accounts')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>List Account</h3>
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="{{route('accounts.create')}}" class="btn btn-primary">Add New Account</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-inverse table-account">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td scope="row">{{++$loop->index}}</td>
                                    <td>{{$account->email}}</td>
                                    <td>{{$account->roles->pluck('name')[0]}}</td>
                                    <td>{{$account->email_verified_at == null ? 'Unverified' : "Verified"}}</td>
                                    <td>
                                        <a href="{{route('accounts.edit', $account->id)}}" class="btn btn-warning btn-edit">Edit</a>
                                        <form action="{{route('accounts.destroy', $account->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.table-account').DataTable();
    });
</script>
@endpush