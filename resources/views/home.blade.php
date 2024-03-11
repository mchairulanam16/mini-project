@extends('layouts.master')

@section('content')
<!-- @if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

                    {{ __('You are logged in!') }} -->
<form>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="department" class="form-label">Jurusan</label>
        <input type="department" name="department" class="form-control" id="department">
    </div>
    <div class="mb-3">
        <label for="faculty" class="form-label">Fakultas</label>
        <input type="faculty" name="faculty" class="form-control" id="faculty">
    </div>
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="code" name="code" class="form-control" id="code">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Peran Jaga</label>
        <input type="option" name="role" class="form-control" id="role">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" name="date" class="form-control" id="date">
    </div>

    <button type="submit" class="btn btn-primary">Clock In</button>
</form>
@endsection
