@extends('layouts.master')

@section('content')
<div id="clock"></div>
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

            {{-- <div class="col-md-6">
                <form action="{{ route('checkout') }}" method="post">
                    <div class="mb-3">
                        <center>
                            <label id="clock" style="font-size: 50px; color:#0A77DE; webkit-text-stroke: 3px #00ACFE" ; text-shadow: 4px 4px 10px #36D6F3, 4px 4px 20px #36D6F3, 4px 4px 30px #36D6F3, 4px 4px 40px #36D6F3;>
                            </label>
                        </center>
                    </div>
                    <div class="mb-3">
                        <label for="id_asisten" class="form-label">ID Asisten</label>
                        <input type="text" value="{{ $data->kelas->name }}" name="id_asisten" class="form-control" id="id_asisten" aria-describedby="emailHelp" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-control" id="options" name="kelas">
                            <option value="{{ $data->kelas->id}}" name="{{ $data->kelas->id }}" disabled>{{ $data->kelas->name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Materi</label>
                        <select class="form-control" id="options" name="subject">
                            <option value="{{ $data->subject->id}}" name="{{ $data->subject->id}}" disabled>{{ $data->subject->name}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Peran Jaga</label>
                        <select class="form-control" id="options" name="role">
                            <option value="{{ $data->teaching_role}}" disabled selected></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode Absen</label>
                        <input type="text" name="code" class="form-control" id="code" value="{{ $data->code->name}}" disabled>
                    </div>
                    <p>*Silahkan minta PJ atau Staff untuk kode absen</p>
                    <button type="submit" class="btn btn-primary">Clock Out</button>
                </form>
            </div> --}}

            <div class="col-md-6">
            <form action="{{ route('checkin') }}" method="post">
                    <div class="mb-3">
                        <center>
                            <label id="clock" style="font-size: 50px; color:#0A77DE; webkit-text-stroke: 3px #00ACFE" ; text-shadow: 4px 4px 10px #36D6F3, 4px 4px 20px #36D6F3, 4px 4px 30px #36D6F3, 4px 4px 40px #36D6F3;>
                            </label>
                        </center>
                    </div>
                    <div class="mb-3">
                        <label for="id_asisten" class="form-label">ID Asisten</label>
                        <input type="text" value="{{ $id_asisten }}" name="id_asisten" class="form-control" id="id_asisten" aria-describedby="emailHelp" disabled>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <!-- <input type="text" name="kelas" class="form-control" id="kelas"> -->
                        <select class="form-control" id="options" name="kelas">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id}}" name="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Materi</label>
                        <select class="form-control" id="options" name="subject">
                            <option value="" disabled selected>Pilih Materi</option>
                            @foreach ($subject as $item)
                            <option value="{{ $item->id}}" name="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Peran Jaga</label>
                        <select class="form-control" id="options" name="role">
                            <option value="" disabled selected>Pilih Peran</option>
                            <option value="ketua">Ketua</option>
                            <option value="tutor">Tutor</option>
                            <option value="pj">PJ</option>
                            <option value="asisten baris">Asisten Baris</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Kode Absen</label>
                        <input type="text" name="code" class="form-control" id="code">
                    </div>
                    <p>*Silahkan minta PJ atau Staff untuk kode absen</p>
                    <button type="submit" class="btn btn-primary">Clock In</button>
                </form>
            </div>

    </div>
</div>
<script>
// (Optional) Include Vue.js if you prefer a more reactive approach
window.onload = function() {
  const clockElement = document.getElementById('clock');
  let intervalId;

  function updateClock() {
    const now = moment().format('hh:mm:ss'); // Use moment.js for formatting (optional)
    clockElement.textContent = now;
  }

  updateClock(); // Initial update
  intervalId = setInterval(updateClock, 1000); // Update every second

  // (Optional) Vue.js approach (replace above with this if using Vue)
  // new Vue({
  //   el: '#app',
  //   data: {
  //     currentTime: moment().format('hh:mm:ss'),
  //   },
  //   mounted() {
  //     setInterval(() => {
  //       this.currentTime = moment().format('hh:mm:ss');
  //     }, 1000);
  //   },
  // });
};
</script>
@endsection
