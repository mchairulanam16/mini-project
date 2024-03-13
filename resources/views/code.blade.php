@extends('layouts.master')

@section('content')
<div class="card-body">
<div class="table-responsive">
    <table class="table table-editable table-nowrap align-middle table-edits">
        <thead class="table-light">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>user pembuat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->user->name }}</td>
                @if ($item->id_used_by != null)
                <td style="color: green;">Sudah Terpakai</td>
                @else
                <td style="color: red">Belum Terpakai</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
