@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item">Dashboard Visitor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div style="overflow-x:auto;">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal Pembuatan Pengajuan</th>
                  <th scope="col">Tanggal Pertemuan</th>
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
                      <td>{{ $schedule->created_at }}</td>
                      <td> 
                              {{ $schedule->tanggal }}
                      </td>
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
                      <td>
                        @if ($schedule->status === null)
                        <span class="badge badge-info">Sedang diproses.</span>
                        @elseif ($schedule->status == "diterima")
                        <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}.</span><br>
                        @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                          <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->satpam_checkout }}, {{ $schedule->waktu_checkout }}.</span>
                        @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                          <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
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
                              <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->satpam_checkout }}, {{ $schedule->waktu_checkout }}.</span>
                            @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                              <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
                            @else
                              <span class="badge badge-success">Check-in : Belum check-in.</span>
                            @endif
                        @elseif ($schedule->status_reschedule == "menolak-reschedule")
                          <span class="badge badge-danger">Menolak Reschedule.</span><br>
                          <span class="badge badge-danger">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                        @else
                          <span class="badge badge-warning">Reschedule.</span><br>
                          <span class="badge badge-warning">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span><br>
                            {{-- ACC --}}
                            <form action="/reschedule-acc" method="post" class="d-inline">
                              @csrf
                              <input type="hidden" name="id" value="{{ $schedule->id }}">
                              <input type="hidden" name="tujuan" value="{{ $schedule->tujuan }}">
                              <button class="btn btn" data-toggle="modal" title="Terima"><i class="fas fa-thumbs-up" style="color: #adc439"></i></button>
                            </form>
                            {{-- REJECT --}}
                            <form action="/reschedule-reject" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $schedule->id }}">
                                <input type="hidden" name="tujuan" value="{{ $schedule->tujuan }}">
                                <button type="submit" class="btn btn"><i class="fas fa-thumbs-down" style="color: #E04146" title="Tolak"></i></button>
                            </form>
                          @endif
                        @endif
                      </td>
                    </tr>
                    <tr>
                  @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </section>
    {{-- <section class="content">
      <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">
        <i class="far fa-chart-bar"></i>
        Donut Chart
        </h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div id="donut-chart" style="height: 300px;"></div>
        </div>
        
        </div>
        
        </div>
        
        </div>
        
        </div>
    </section> --}}
    <!-- /.content -->
  </div>
@endsection

  