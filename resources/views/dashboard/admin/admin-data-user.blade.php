@extends('dashboard.admin.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jadwal Pertemuan Visitor</h1>
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
            
          </div>
        </div>

        <div style="overflow-x:auto;">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Instansi</th>
                  <th scope="col">Nomor HP</th>
                  <th scope="col">NIK</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <th scope="row">
                          {{ $loop->iteration }}</th>
                      <td>{{ $user->nama }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->instansi }}</td>
                      <td>{{ $user->nomor_hp }}</td>
                      <td>{{ $user->nik }}</td>
                    </tr>
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

  