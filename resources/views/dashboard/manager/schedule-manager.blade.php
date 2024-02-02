@extends('dashboard.manager.partials.main')

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
              <li class="breadcrumb-item"><a href="/dashboard-manager">Home</a></li>
              <li class="breadcrumb-item">Dashboard Manager</li>
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
            {{-- <form action="/filter-schedule-staff" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-5">
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                      <option selected value="null"></option>
                      <option value="menunggu-staff">Menunggu Staff</option>
                      <option value="diterima">Diterima Staff</option>
                      <option value="ditolak">Ditolak Staff</option>
                      <option value="menunggu-reschedule">Menunggu Reschedule</option>
                      <option value="menerima-reschedule">Menerima Reschedule</option>
                      <option value="menolak-reschedule">Menolak Reschedule</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form> --}}
            <div class="mb-3">
              <label for="searchInput" class="form-label">Search</label>
              <input type="text" class="form-control" id="searchInput">
            </div>
          </div>
        </div>
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Yang Diajukan</th>
                <th scope="col">Waktu</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}</th>
                    <td>{{ $schedule->nama }}</td>
                    <td>{{ $schedule->tanggal }}</td>
                    <td>{{ $schedule->waktu }}</td>
                    <td>{{ $schedule->tujuan }}</td>
                    <td>{{ $schedule->keperluan }}</td>
                    <td>{{ $schedule->keterangan }}</td>
                    <td style="text-align: center;">
                        @if ($schedule->status === null)
                        <span class="badge badge-info">Menunggu Staff</span>
                        @elseif ($schedule->status == "diterima")
                        <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}</span>
                        @elseif ($schedule->status == "ditolak")
                        <span class="badge badge-danger">Ditolak</span>
                        @elseif ($schedule->status == "reschedule")
                        @if ($schedule->status_reschedule == "menerima-reschedule")
                          <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}</span>
                          <span class="badge badge-success">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                        @elseif ($schedule->status_reschedule == "menolak-reschedule")
                          <span class="badge badge-danger">Menolak Reschedule</span>
                          <span class="badge badge-danger">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                        @else
                          <span class="badge badge-warning">Reschedule</span>
                          <span class="badge badge-warning">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}</span>
                            
                        @endif
                      @endif
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </section>
    
  </div>
  
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

  