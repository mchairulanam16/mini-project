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

<!-- modal -->
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
                <input type="text" class="form-control" id="level" name="level" placeholder="Masukkan Tingkat">
            </div>
            <div class="form-group">
                <label for="name"> Kelas</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Kelas"
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Get the form element
    const form = document.getElementById('myForm');

    // Add an event listener to the submit button
    document.getElementById('submitBtn').addEventListener('click', function() {
        // Serialize form data
        const formData = new FormData(form);

        // Send form data via Axios
        axios.post(form.getAttribute('action'), formData)
            .then(function (response) {
                // Handle success response
                console.log(response.data);
                // Redirect the user to a new page or do something else
                window.location.href = "{{ route('class') }}";
            })
            .catch(function (error) {
                // Handle error
                console.error(error);
            });
    });
</script>
@endsection
