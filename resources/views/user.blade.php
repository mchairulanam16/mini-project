@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row justify-content-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Asisten
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg></a>
        </button>
    </div>
    @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->id_asisten }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-user-id="{{ $user->id }}">
                                    <img src="{{ asset ('assets/images/icon/pencil.svg')}}" alt="">
                                </button>
                            </div>
                            <div class="col-md-3">
                                <form method="POST" action="{{ route('user.delete', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                <img src="{{ asset ('assets/images/icon/trash.svg')}}" alt="">
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Asisten</h5>
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

<!-- modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Asisten</h5>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="myEditForm" method="POST" action="{{ route('user.update', ['id' => ':id']) }}">
            @csrf
            <div class="form-group">
                <label for="id_asisten_edit">ID Asisten</label>
                <input type="text" class="form-control" id="id_asisten_edit" name="id_asisten_edit">
            </div>
            <div class="form-group">
                <label for="name_edit">Nama</label>
                <input type="text" class="form-control" id="name_edit" name="name_edit">
            </div>
            <div class="form-group">
                <label for="email_edit">Email</label>
                <input type="email_edit" class="form-control" id="email_edit" name="email_edit">
            </div>
            <div class="form-group">
                <label for="role_edit">Role</label>
                <select class="form-control" id="role_edit" name="role_edit">
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
        <button type="button" class="btn btn-primary" id="submitEditBtn">Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- script add modal -->
<script>
    // Get the form element
    const formAdd = document.getElementById('myForm');

    // Add an event listener to the submit button
    document.getElementById('submitBtn').addEventListener('click', function() {
        // Serialize form data
        const formData = new FormData(formAdd);

        // Send form data via Axios
        axios.post(formAdd.getAttribute('action'), formData)
            .then(function (response) {
                // Handle success response
                console.log(response.data);
                alert(response.data.message);
                // Redirect the user to a new page or do something else
                window.location.href = "{{ route('user') }}";
            })
            .catch(function (error) {
                // Handle error
                console.error(error);
            });
    });
</script>
<!-- script edit modal pop-up-->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const userId = button.dataset.userId;
            axios.get('/user/' + userId)
                .then(function (response) {
                    const user = response.data;
                    document.getElementById('id_asisten_edit').value = user.id_asisten;
                    document.getElementById('name_edit').value = user.name;
                    document.getElementById('email_edit').value = user.email;
                    document.getElementById('role_edit').value = user.role;

                    document.getElementById('myEditForm').action = "{{ route('user.update', ['id' => ':id']) }}"
                        .replace(':id', user.id);
            })
            .catch(function (error) {
                console.error(error);
            });
        });
    });
});
</script>
<!-- script submit edit form -->
<script>
    const formEdit = document.getElementById('myEditForm');

    document.getElementById('submitEditBtn').addEventListener('click', function() {
        const formData = new FormData(formEdit);

        axios.post(formEdit.getAttribute('action'), formData)
            .then(function (response) {
                console.log(response.data);
                alert(response.data.message);
                window.location.href = "{{ route('user') }}";
            })
            .catch(function (error) {
                console.error(error);
            });
    });
</script>


@endsection
