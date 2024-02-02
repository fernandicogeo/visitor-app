@extends('dashboard.satpam.partials.main')

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
        <div class="row">
          <div class="col-lg-6">
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
                    @if ($schedule->status == 'diterima' || $schedule->status_reschedule == "menerima-reschedule")
                    <td>
                      @if ($schedule->waktu_checkin == NULL)
                        {{-- CHECK-IN --}}
                        <form action="/schedule-check-in-satpam" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $schedule->id }}">
                          <button type="submit" class="btn btn">
                            <i class="nav-icon fas fa-sign-in-alt" style="color: #adc439"></i>
                          </button>
                        </form>
                      @else
                        {{ $schedule->waktu_checkin }}
                      @endif
                    </td>
                    <td>
                      @if ($schedule->waktu_checkout == NULL && $schedule->waktu_checkin != NULL)
                        {{-- CHECK-OUT --}}
                        <form action="/schedule-check-out-satpam" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="id" value="{{ $schedule->id }}">
                          <button type="submit" class="btn btn">
                            <i class="nav-icon fas fa-sign-out-alt" style="color: #E04146"></i>
                          </button>
                        </form>
                        @else
                          {{ $schedule->waktu_checkout }}
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
    </section>
    
  </div>
@endsection

  