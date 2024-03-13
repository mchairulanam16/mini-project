@extends('layouts.master')
@php $role = App\Models\User::where('id', Auth::id())->first();
$kelas = App\Models\Kelas::all();
$subject = App\Models\Subject::all();
$today = Carbon\Carbon::now()->timezone('Asia/Bangkok')->toDateString();
$isCheckin = App\Models\Absence::where('user_id', Auth::id())->where('date', $today)->where('end', null)->first();
@endphp
@section('content')
<div class="card-body">
    <div class="row">
        @if($role->role == "staff" || $role->role == "admin" || $role->role == "pj")
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
        @endif

        <div class="col-md-6">

            <h1>Selamat Datang {{ $role->name}}</h1>
            <form id="form-checkin" action="{{ route('checkin') }}" method="post">
                @csrf
                <div class="mb-3">
                    <center>
                        <label id="clock" style="font-size: 50px; color:#0A77DE; webkit-text-stroke: 3px #00ACFE" ; text-shadow: 4px 4px 10px #36D6F3, 4px 4px 20px #36D6F3, 4px 4px 30px #36D6F3, 4px 4px 40px #36D6F3;>
                        </label>
                    </center>
                </div>
                <div class="mb-3">
                    <label for="id_asisten" class="form-label">ID Asisten</label>
                    <input type="text" value="{{ $role->id_asisten }}" name="id_asisten" class="form-control" id="id_asisten" aria-describedby="emailHelp" disabled>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-control" id="options" name="kelas" @if(!empty($isCheckin)) disabled @endif>
                        <option value="" disabled selected>Pilih Kelas</option>
                        @foreach ($kelas as $item)
                        <option value="{{ $item->id}}" name="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Materi</label>
                    <select class="form-control" id="options" name="subject" @if(!empty($isCheckin)) disabled @endif>
                        <option value="" disabled selected>Pilih Materi</option>
                        @foreach ($subject as $item)
                        <option value="{{ $item->id}}" name="{{ $item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Peran Jaga</label>
                    <select class="form-control" id="options" name="role" @if(!empty($isCheckin)) disabled @endif>
                        <option value="" disabled selected>Pilih Peran</option>
                        <option value="ketua">Ketua</option>
                        <option value="tutor">Tutor</option>
                        <option value="pj">PJ</option>
                        <option value="asisten baris">Asisten Baris</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Absen</label>
                    <input type="text" name="code" class="form-control" id="code" @if(!empty($isCheckin)) disabled @endif>
                    @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <p>*Silahkan minta PJ atau Staff untuk kode absen</p>
                @if(empty($isCheckin))
                <button type="submit" class="btn btn-primary">Clock In</button>
                @endif
            </form>
            @if(!empty($isCheckin))
            <form id="form-checkout" action="{{ route('checkout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-warning">Clock Out</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
