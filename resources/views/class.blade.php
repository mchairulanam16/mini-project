@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row justify-content-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Kelas
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg></a>
        </button>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead class="table-light">
                    <tr>
                        <th>id</th>
                        <th>Jurusan</th>
                        <th>Fakultas</th>
                        <th>Tingkat</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $kelas)
                    <tr>
                        <td>{{ $kelas->id }}</td>
                        <td>{{ $kelas->department }}</td>
                        <td>{{ $kelas->faculty }}</td>
                        <td>{{ $kelas->level }}</td>
                        <td>{{ $kelas->name }}</td>
                        <td>
                        <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-kelas-id="{{ $kelas->id }}">
                        <img src="{{ asset ('assets/images/icon/pencil.svg')}}" alt="">
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="myForm" method="POST" action="{{ route('class.add') }}">
            @csrf
            <div class="form-group">
                <label for="department">Jurusan</label>
                <input type="text" class="form-control" id="department" name="department" placeholder="Masukkan Jurusan">
            </div>
            <div class="form-group">
                <label for="faculty">Fakultas</label>
                <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Masukkan Fakultas">
            </div>
            <div class="form-group">
                <label for="level">Tingkat</label>
                <input type="text" class="form-control" id="level" name="level" placeholder="Masukkan Tingkat" autocom>
            </div>
            <div class="form-group">
                <label for="name">kelas</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Tingkat">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Kelas</h5>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="editKelasForm" method="POST" action="{{ route('class.update', ['id' => ':id'])}}">
            @csrf
            <div class="form-group">
                <label for="department_edit">Jurusan</label>
                <input type="text" class="form-control" id="department_edit" name="department_edit">
            </div>
            <div class="form-group">
                <label for="faculty_edit">Fakultas</label>
                <input type="text" class="form-control" id="faculty_edit" name="faculty_edit">
            </div>
            <div class="form-group">
                <label for="level_edit">Tingkat</label>
                <input type="text" class="form-control" id="level_edit" name="level_edit">
            </div>
            <div class="form-group">
                <label for="name_edit">kelas</label>
                <input type="text" class="form-control" id="name_edit" name="name_edit">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitEditBtn">Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const form = document.getElementById('myForm');

    document.getElementById('submitBtn').addEventListener('click', function() {
        const formData = new FormData(form);

        axios.post(form.getAttribute('action'), formData)
            .then(function (response) {
                console.log(response.data);
                alert(response.data.message);
                window.location.href = "{{ route('class') }}";
            })
            .catch(function (error) {
                console.error(error);
            });
    });
</script>
<!-- script edit modal popup -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const kelasId = button.dataset.kelasId;
            axios.get('/kelas/' + kelasId)
            .then(function (response) {
                console.log(response.data);
                const kelas = response.data;
                document.getElementById('department_edit').value = kelas.department;
                document.getElementById('faculty_edit').value = kelas.faculty;
                document.getElementById('level_edit').value = kelas.level;
                document.getElementById('name_edit').value = kelas.name;

                document.getElementById('editKelasForm').action ="{{ route('class.update', ['id' => ':id']) }}"
                    .replace(':id', kelas.id);
            })
            .catch(function (error) {
                console.error(error);
            });
        });
    });
})
</script>
<!-- script submit edit form -->
<script>
    const formEditKelas = document.getElementById('editKelasForm');

    document.getElementById('submitEditBtn').addEventListener('click', function() {

        const formData = new FormData(formEditKelas);

        axios.post(formEditKelas.getAttribute('action'), formData)
            .then(function (response) {
                console.log(response.data);
                alert(response.data.message);
                window.location.href = "{{ route('class') }}";
            })
            .catch(function (error) {
                console.error(error);
            });
    });
</script>
@endsection
