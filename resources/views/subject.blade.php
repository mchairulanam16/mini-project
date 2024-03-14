@extends('layouts.master')

@section('content')
<div class="card-body">
    <div class="row justify-content-center mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Materi
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
                        <th>materi</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                        <div class="row">
                        <div class="col-md-3">
                        <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-subject-id="{{ $subject->id }}">
                        <img src="{{ asset ('assets/images/icon/pencil.svg')}}" alt="">
                        </button>
                        </div>
                        <div class="col-md-3">
                                <form method="POST" action="{{ route('subject.delete', $subject->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                <img src="{{ asset ('assets/images/icon/trash.svg')}}" alt="">
                                </button>
                                </form>
                            </div>
                        </div>
                        </td>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="myForm" method="POST" action="{{ route('subject.add')}}">
            @csrf
            <div class="form-group">
                <label for="name">Materi</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Materi">
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
        <h5 class="modal-title" id="editModalLabel">Edit Materi</h5>
      </div>
      <div class="modal-body">
        <!-- Form goes here -->
        <form id="editSubject" method="POST" action="{{ route('subject.update', ['id' => ':id']) }}" >
            @csrf
            <div class="form-group">
                <label for="name_edit">materi</label>
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
<!-- script submit add form -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const form = document.getElementById('myForm');

    document.getElementById('submitBtn').addEventListener('click', function() {
        const formData = new FormData(form);

        axios.post(form.getAttribute('action'), formData)
            .then(function (response) {
                console.log(response.data);
                alert(response.data.message);
                window.location.href = "{{ route('subject') }}";
            })
            .catch(function (error) {
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
            const subjectId = button.dataset.subjectId;
            axios.get('/subject/' + subjectId)
                .then(function (response) {
                    const subject = response.data;
                    document.getElementById('name_edit').value = subject.name;
                    document.getElementById('editSubject').action = "{{ route('subject.update', ['id' => ':id']) }}"
                        .replace(':id', subject.id);
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
    const formEdit = document.getElementById('editSubject');

    document.getElementById('submitEditBtn').addEventListener('click', function() {
        const formData = new FormData(formEdit);

        axios.post(formEdit.getAttribute('action'), formData)
            .then(function (response) {
                console.log(response.data);
                alert(response.data.message);
                window.location.href = "{{ route('subject') }}";
            })
            .catch(function (error) {
                console.error(error);
            });
    });
</script>

@endsection
