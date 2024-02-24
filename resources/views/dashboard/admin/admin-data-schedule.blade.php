@extends('dashboard.admin.partials.main')

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
        <h5>Export Excel</h5>
        <div class="row"> 
          <div class="col-lg-6">
            <form action="/export-admin" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <label for="tahun">Tahun:</label>
                </div>
                <div class="col-md-3">
                  <label for="bulan">Bulan:</label>
                </div>
                <div class="col-md-3">
                  <label for="divisi">Divisi:</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-3">
                  <select class="form-control" id="bulan" name="bulan">
                      <option value="all">All</option>
                      @foreach($bulan as $value => $label)
                          <option value="{{ $value }}">{{ $label }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-control" id="divisi" name="divisi">
                      <option value="all">All</option>
                      @foreach($divisions as $divisi)
                          <option value="{{ $divisi->nama }}">{{ $divisi->nama }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                  <button type="submit" class="btn btn-success">Export Excel</button>
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
                          <span class="badge badge-info">Menunggu Staff</span>
                          @elseif ($schedule->status == "diterima")
                          <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}</span>
                          @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                            <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}</span>
                          @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                            <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out</span>
                          @else
                            <span class="badge badge-success">Check-in : Belum check-in</span>
                          @endif
                          @elseif ($schedule->status == "ditolak")
                          <span class="badge badge-danger">Ditolak</span>
                          @elseif ($schedule->status == "reschedule")
                          @if ($schedule->status_reschedule == "menerima-reschedule")
                            <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}</span>
                            <span class="badge badge-success">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}</span>
                              @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                                <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}</span>
                              @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                                <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out</span>
                              @else
                                <span class="badge badge-success">Check-in : Belum check-in</span>
                              @endif
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

  