@extends('layouts.master')

@section('content')
<div class="card-body">
<form action="{{ route('export') }}" method="get" class="form-inline">
    <div class="form-group mr-2">
        <label for="start_date" class="mr-2">Start Date:</label>
        <input type="date" id="start_date" name="start_date" class="form-control" required>
    </div>

    <div class="form-group mr-2">
        <label for="end_date" class="mr-2">End Date:</label>
        <input type="date" id="end_date" name="end_date" class="form-control" required>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Export Report</button>
</form>

</div>
<div class="card-body">
<div class="table-responsive">
    <table class="table table-editable table-nowrap align-middle table-edits">
        <thead class="table-light">
            <tr>
                <th>id</th>
                <th>kelas</th>
                <th>materi</th>
                <th>asisten</th>
                <th>kode</th>
                <th>peran jaga</th>
                <th>tanggal</th>
                <th>mulai</th>
                <th>selesai</th>
                <th>durasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kelas->name }}</td>
                <td>{{ $item->subject->name }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->code->name }}</td>
                <td>{{ $item->teaching_role }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->start }}</td>
                <td>{{ $item->end }}</td>
                <td>{{ $item->duration }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
