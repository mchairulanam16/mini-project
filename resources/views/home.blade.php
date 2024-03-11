@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h1>
                    Silahkan klik tombol dibawah ini untuk mendapatkan kode
                </h1>
            </div>
            <center>
            <a href="{{ route('generateCode') }}" class="btn btn-success">Generate Code</a>
            </center>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <div class="mb-3">
                    <center>
                        <label id="clock" style="font-size: 50px; color:#0A77DE; webkit-text-stroke: 3px #00ACFE" ; text-shadow: 4px 4px 10px #36D6F3, 4px 4px 20px #36D6F3, 4px 4px 30px #36D6F3, 4px 4px 40px #36D6F3;>
                        </label>
                    </center>
                </div>
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
        </div>
    </div>
</div>
@endsection
