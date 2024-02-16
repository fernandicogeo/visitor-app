@extends('dashboard.staff.partials.main')

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
              <li class="breadcrumb-item"><a href="/dashboard-staff">Home</a></li>
              <li class="breadcrumb-item">Dashboard Staff</li>
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
            <form action="/export-staff" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <label for="tahun">Tahun:</label>
                </div>
                <div class="col-md-4">
                  <label for="bulan">Bulan:</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <select class="form-control" id="tahun" name="tahun">
                    <option value="all">All</option>
                    @php
                      $currentYear = date('Y');
                      $startYear = 2022;
                    @endphp
                    @for ($year = $currentYear; $year >= $startYear; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
                </div>
                <div class="col-md-4">
                  <select class="form-control" id="bulan" name="bulan">
                      <option value="all">All</option>
                      @foreach($bulan as $value => $label)
                          <option value="{{ $value }}">{{ $label }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Export PDF</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-2 mb-3">
          </div>
          <div class="col-lg-4 mb-3">
            <label for="searchInput" class="form-label">Search</label>
            <input type="text" class="form-control" id="searchInput">
          </div>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Pembuatan Pengajuan</th>
                <th scope="col">Tanggal Yang Diajukan</th>
                <th scope="col">Waktu</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Kendaraan</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}</th>
                    <td>{{ $schedule->nama }}</td>
                    <td>{{ $schedule->created_at }}</td>
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
                            {{-- ACC --}}
                            <form action="/schedule-acc" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $schedule->id }}">
                                <input type="hidden" name="tujuan" value="{{ $schedule->tujuan }}">
                                <button class="btn btn" data-toggle="modal" title="Terima"><i class="fas fa-thumbs-up" style="color: #adc439"></i></button>
                            </form>
                            {{-- RESCHEDULE --}}
                            <button class="btn btn" data-toggle="modal" data-target="#modal-sm-reschedule{{ $schedule->id }}" title="Reschedule"><i class="fa fa-clock-o" aria-hidden="true" style="color: #ffcc00"></i></button>
                            {{-- REJECT --}}
                            <form action="/schedule-reject" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $schedule->id }}">
                                <input type="hidden" name="tujuan" value="{{ $schedule->tujuan }}">
                                <button type="submit" class="btn btn"><i class="fas fa-thumbs-down" style="color: #E04146" title="Tolak"></i></button>
                            </form>
                            @elseif ($schedule->status == "diterima")
                            <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}.</span><br>
                            @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                              <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}.</span>
                            @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                              <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
                            @else
                              <span class="badge badge-success">Check-in : Belum check-in.</span>
                            @endif
                            @elseif ($schedule->status == "ditolak")
                            <span class="badge badge-danger">Ditolak.</span>
                            @elseif ($schedule->status == "reschedule")
                            @if ($schedule->status_reschedule == "menerima-reschedule")
                              <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}.</span><br>
                              <span class="badge badge-success">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span><br>
                                @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                                  <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}.</span>
                                @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                                  <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
                                @else
                                  <span class="badge badge-success">Check-in : Belum check-in.</span>
                                @endif
                            @elseif ($schedule->status_reschedule == "menolak-reschedule")
                              <span class="badge badge-danger">Menolak Reschedule.</span><br>
                              <span class="badge badge-danger">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                            @else
                              <span class="badge badge-warning">Reschedule.</span><br>
                              <span class="badge badge-warning">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                            @endif
                          @endif
                    </td>
                  </tr>

                  <form action="/schedule-reschedule" method="post" class="d-inline">
                      @csrf
                      <input type="hidden" name="id" value="{{ $schedule->id }}">
                        <div class="modal fade" id="modal-sm-reschedule{{ $schedule->id }}">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                    
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih jadwal Reschedule</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                    
                                <div class="modal-body" style="min-height: 200px">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="tanggal_reschedule" class="form-label">Tanggal Reschedule</label>
                                            <input type="date" class="form-control" id="tanggal_reschedule" name="tanggal_reschedule" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="waktu_reschedule" class="form-label">Waktu Reschedule</label>
                                            <select class="form-select" id="waktu_reschedule" name="waktu_reschedule" required>
                                              <option selected></option>
                                              <option value="pagi (09.00 - 11.00)">Pagi (09.00 - 11.00)</option>
                                              <option value="siang (14.00 - 16.00)">Siang (14.00 - 16.00)</option>
                                            </select>
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

  