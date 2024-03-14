@extends('layouts.master')

@section('content')
<div>
    <h2>Klik tombol untuk generate code</h2>
    <h4>
        <a href="{{ route('generateCode') }}" class="btn btn-success">Generate Code</a>
    </h4>
    @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                @if(session()->has('code'))
                    <p>Kode: {{ session('code') }}</p>
                @endif
            </div>
            @endif
</div>
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
                <td style="background-color: green; color: white;">Sudah Terpakai</td>
                @else
                <td style="background-color: red; color: white;">Belum Terpakai</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
