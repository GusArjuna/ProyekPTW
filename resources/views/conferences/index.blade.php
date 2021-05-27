@extends('layout.main')
@section('judul','Conferences')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>List Conferences</h3>
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="{{route('conferences.create')}}" class="btn btn-primary">Add New Conference</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-inverse table-meeting">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Topic</th>
                            <th>Tanggal & Waktu</th>
                            <th>Password</th>
                            <th>Join Url</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($conferences as $conference)
                                <tr>
                                    <td>{{++$loop->index}}</td>
                                    <td>{{$conference->topic}}</td>
                                    <td>
                                        @php
                                            $details = json_decode($conference->details, true);
                                            echo date('Y-m-d H:i:s', strtotime($details['start_time']));
                                        @endphp
                                    </td>
                                    <td>{{$conference->password}}</td>
                                    <td>
                                        <a href="{{$conference->join_url}}" target="_blank">
                                            {{$conference->join_url}}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('conferences.destroy', $conference->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
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
        $('.table-meeting').DataTable();
    });
</script>
@endpush