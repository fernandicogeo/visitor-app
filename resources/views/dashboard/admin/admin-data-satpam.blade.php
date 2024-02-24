@extends('dashboard.admin.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Satpams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard-admin">Home</a></li>
              <li class="breadcrumb-item">Dashboard Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-lg-6">
            <div class="mb-3">
              <label for="searchInput" class="form-label">Search</label>
              <input type="text" class="form-control" id="searchInput">
            </div>
            <div class="mb-3">
                {{-- CREATE --}}
                <button class="btn btn" data-toggle="modal" data-target="#modal-sm-create" title="Tambah Data"><i class="bi bi-plus-circle-fill" aria-hidden="true" style="color: #adc439"></i></button>
            </div>
          </div>
        </div>

        <div style="overflow-x:auto;">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($satpams as $satpam)
                  <tr>
                      <th scope="row">
                          {{ $loop->iteration }}</th>
                      <td>{{ $satpam->nama }}</td>
                      <td>{{ $satpam->username }}</td>
                      <td>
                          {{-- EDIT --}}
                          <button class="btn btn" data-toggle="modal" data-target="#modal-sm-edit{{ $satpam->id }}" title="Edit Data"><i class="bi bi-pen-fill" aria-hidden="true" style="color: #ffcc00"></i></button>
                          {{-- REJECT --}}
                          <form action="/delete-admin-data-satpam" method="post" class="d-inline">
                              @csrf
                              <input type="hidden" name="id" value="{{ $satpam->id }}">
                              <button type="submit" class="btn btn"><i class="bi bi-trash3-fill" style="color: #E04146" title="Tolak"></i></button>
                          </form>
                      </td>
                    </tr>

                    {{-- CREATE MODAL --}}
                    <form action="/create-admin-data-satpam" method="post" class="d-inline" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $satpam->id }}">
                        <div class="modal fade" id="modal-sm-create">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body" style="min-height: 200px">
                                      <div class="form-group">
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label><span class="req">*</span>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="username" class="form-label">Username</label><span class="req">*</span>
                                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                                              @error('username')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="password" class="form-label">Password</label><span class="req">*</span>
                                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                              @error('password')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                      </div>
                                </div>
                    
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>

                    {{-- EDIT MODAL --}}
                    <form action="/edit-admin-data-satpam" method="post" class="d-inline" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $satpam->id }}">
                        <div class="modal fade" id="modal-sm-edit{{ $satpam->id }}">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body" style="min-height: 200px">
                                      <div class="form-group">
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label><span class="req">*</span>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $satpam->nama }}" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="username" class="form-label">Username</label><span class="req">*</span>
                                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $satpam->username }}" required>
                                              @error('username')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="password" class="form-label">Password</label>
                                              <small>Kosongkan jika tidak ingin mengganti password</small>
                                              <input type="password" class="form-control" id="password" name="password">
                                          </div>
                                      </div>
                                </div>
                    
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                  @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </section>
    
  </div>
  <!-- Tambahkan link ke jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    $('#searchInput').on('keyup', function () {
      const searchTerm = $(this).val().toLowerCase();

      $('table tbody tr').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
      });
    });
  });
</script>

@endsection

  