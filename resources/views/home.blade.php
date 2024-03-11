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
            <form action="{{ route('checkin') }}" method="post">
                <div class="mb-3">
                    <center>
                        <label id="clock" style="font-size: 50px; color:#0A77DE; webkit-text-stroke: 3px #00ACFE" ; text-shadow: 4px 4px 10px #36D6F3, 4px 4px 20px #36D6F3, 4px 4px 30px #36D6F3, 4px 4px 40px #36D6F3;>
                        </label>
                    </center>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">ID Asisten</label>
                    <input type="text" value="{{ $name }}" name="name" class="form-control" id="nama" aria-describedby="emailHelp" disabled>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <!-- <input type="text" name="kelas" class="form-control" id="kelas"> -->
                    <select class="form-control" id="options" name="options">
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelas as $item)
                        <option value="{{ $item->name}}">{{ $item->name}}</option>
                        <!-- Add more options as needed -->
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Materi</label>
                    <select class="form-control" id="options" name="options">
                        <option value="" disabled selected>Pilih Materi</option>
                        @foreach ($subject as $item)
                        <option value="{{ $item->name}}">{{ $item->name}}</option>
                        <!-- Add more options as needed -->
                        @endforeach
                    </select>
                </div>
                <!-- <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas">
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Tingkat</label>
                    <input type="text" name="level" class="form-control" id="level">
                </div> -->
                <div class="mb-3">
                    <label for="role" class="form-label">Peran Jaga</label>
                    <select class="form-control" id="options" name="options">
                        <option value="" disabled selected>Pilih Peran</option>
                        <option value="ketua">Ketua</option>
                        <option value="tutor">Tutor</option>
                        <option value="pj">PJ</option>
                        <option value="asisten baris">Asisten Baris</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Absen</label>
                    <input type="text" name="code" class="form-control" id="code">
                </div>
                <p>*Silahkan minta PJ atau Staff untuk kode absen</p>
                <!-- <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div> -->

                <button type="submit" class="btn btn-primary">Clock In</button>
            </form>
        </div>
    </div>
</div>
@endsection
