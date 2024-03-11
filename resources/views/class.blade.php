@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row justify-content-center mb-4">
        <a href="" class="btn btn-info">
            TAMBAH KELAS<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
            </svg></a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead class="table-light">
                    <tr>
                        <th>id</th>
                        <th>jurusan</th>
                        <th>fakultas</th>
                        <th>tingkat</th>
                        <th>kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->department }}</td>
                        <td>{{ $item->faculty }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
