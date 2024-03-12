@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row justify-content-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Asisten
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
                        <th>id asisten</th>
                        <th>nama</th>
                        <th>email</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->id_asisten }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Asisten</h5>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="myForm" method="POST" action="{{ route('user.add') }}">
            @csrf
            <div class="form-group">
                <label for="id_asisten">ID Asisten</label>
                <input type="text" class="form-control" id="id_asisten" name="id_asisten" placeholder="ex: 18889">
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="options" name="role">
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="admin">admin</option>
                        <option value="staff">staff</option>
                        <option value="pj">PJ</option>
                        <option value="asisten">asisten</option>
                    </select>
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
                window.location.href = "{{ route('user') }}";
            })
            .catch(function (error) {
                // Handle error
                console.error(error);
            });
    });
</script>
@endsection
