@extends('dashboard.satpam.partials.main')

@section('container')
@php
  $bulan = [
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember',
  ];
@endphp
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
              <li class="breadcrumb-item"><a href="/dashboard-satpam">Home</a></li>
              <li class="breadcrumb-item">Dashboard Satpam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h5>Export PDF</h5>
        <div class="row"> 
          <div class="col-lg-6">
            <form action="/export-satpam" method="post" enctype="multipart/form-data">
              @csrf
              <input type="text" hidden value="{{ $divisi }}" name="divisi">
              <input type="text" hidden value="divisi" name="status">
              <button type="submit" class="btn btn-primary">Export PDF</button>
            </form>
          </div>
          <div class="col-lg-2 mb-3">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="searchInput" class="form-label">Search</label>
            <input type="text" class="form-control" id="searchInput">
          </div>
        </div>
        
        <div style="overflow-x:auto;">
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
                  <th scope="col">Kendaraan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Check-in</th>
                  <th scope="col">Check-out</th>
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
                      <td>
                        {{ $schedule->kendaraan }}
                        @if ($schedule->kendaraan == 'Pribadi')
                          , {{ $schedule->jenis_kendaraan }}, {{ $schedule->nopol_kendaraan }}
                        @endif
                      </td>
                      <td style="text-align: center;">
                          @if ($schedule->status === null)
                          <span class="badge badge-info">Menunggu Staff.</span>
                          @elseif ($schedule->status == "diterima")
                          <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}.</span>
                          @elseif ($schedule->status == "ditolak")
                          <span class="badge badge-danger">Ditolak.</span>
                          @elseif ($schedule->status == "reschedule")
                          @if ($schedule->status_reschedule == "menerima-reschedule")
                            <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}.</span><br>
                            <span class="badge badge-success">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                          @elseif ($schedule->status_reschedule == "menolak-reschedule")
                            <span class="badge badge-danger">Menolak Reschedule.</span><br>
                            <span class="badge badge-danger">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                          @else
                            <span class="badge badge-warning">Reschedule.</span><br>
                            <span class="badge badge-warning">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                          @endif
                        @endif
                      </td>
                      @if ($schedule->status == 'diterima' || $schedule->status_reschedule == "menerima-reschedule")
                      <td>
                        @if ($schedule->waktu_checkin == NULL)
                          <button type="submit" class="btn btn" data-toggle="modal" data-target="#exampleModal" data-id="{{ $schedule->id }}">
                            <i class="nav-icon fas fa-sign-in-alt" style="color: #adc439"></i>
                          </button>
                        @else
                          {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}
                        @endif
                      </td>
                      <td>
                        @if ($schedule->waktu_checkout == NULL && $schedule->waktu_checkin != NULL)
                          <button type="submit" class="btn btn" data-toggle="modal" data-target="#exampleModal1" data-id="{{ $schedule->id }}">
                            <i class="nav-icon fas fa-sign-out-alt" style="color: #E04146"></i>
                          </button>
                          @else
                          {{ $schedule->satpam_checkout }}, {{ $schedule->waktu_checkout }}
                          @endif
                      </td> 
                      @else
                      <td></td>
                      <td></td>
                      @endif
                    </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </section>
    
  </div>

<!-- Modal Check-In -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check-In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- CHECK-IN --}}
        <form action="/schedule-check-in-satpam" method="post" class="d-inline">
          @csrf
          <input type="hidden" name="id" id="schedule-id">
          <div class="form-group">
            <label for="satpam_name">Nama Satpam</label>
            <select class="form-select @error('satpam_name') is-invalid @enderror" id="satpam_name" name="satpam_name" required>
                @foreach($satpam_names as $satpam_name)
                <option value="{{ $satpam_name->satpam_name }}">{{ $satpam_name->satpam_name }}</option>
                @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitForm()">Check In</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Check-Out -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check-Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- CHECK-OUT --}}
        <form action="/schedule-check-out-satpam" method="post" class="d-inline">
          @csrf
          <input type="hidden" name="id" id="schedule-id">
          <div class="form-group">
            <label for="satpam_name">Nama Satpam</label>
            <select class="form-select @error('satpam_name') is-invalid @enderror" id="satpam_name" name="satpam_name" required>
                @foreach($satpam_names as $satpam_name)
                <option value="{{ $satpam_name->satpam_name }}">{{ $satpam_name->satpam_name }}</option>
                @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitForm()">Check Out</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var scheduleId = button.data('id');
    var modal = $(this);
    modal.find('#schedule-id').val(scheduleId);
  });

  $('#exampleModal1').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var scheduleId = button.data('id');
    var modal = $(this);
    modal.find('#schedule-id').val(scheduleId);
  });
  function submitForm() {
    $('form').submit();
  }
</script>

@endsection

  