@extends('layout.main')
@section('judul','Conferences')

@section('bagan')

<div class="editsiswa">
    <div class="container mt-5 mb-5">
        <h3>List Conferences</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-inverse table-conferences">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>Topic</th>
                            <th>Tanggal & Waktu</th>
                            <th>Password</th>
                            <th>Join Url</th>
                            <th>Link Presensi</th>
                            {{-- <th>Action</th> --}}
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
                                        <a href="{{route('attendences.presensi', $conference->attendences->id)}}" class="btn btn-xs btn-success btn-sm">Presensi</a>
                                    </td>
                                    {{-- <td>
                                        <a href="#modalDetail" data-toggle="modal" class="btn btn-info btn-detail" data-conference="{{$conference}}">
                                            Detail
                                        </a>
                                    </td> --}}
                                </tr>
                           @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.table-conferences').DataTable();

        $(".table-conferences").on('click', '.btn-detail', function() {

        })
    });
</script>
@endpush