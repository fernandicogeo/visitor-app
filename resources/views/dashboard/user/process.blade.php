@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sedang diproses</h1>
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
                  <th scope="col">Tanggal Yang Diajukan</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Tujuan</th>
                  <th scope="col">Keperluan</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($schedules as $schedule)
                  <tr>
                      <th scope="row">
                          {{ $loop->iteration }}</th>
                      <td>{{ $schedule->created_at }}</td>
                      <td>{{ $schedule->tanggal }}</td>
                      <td>{{ $schedule->waktu }}</td>
                      <td>{{ $schedule->tujuan }}</td>
                      <td>{{ $schedule->keperluan }}</td>
                      <td>{{ $schedule->keterangan }}</td>
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

  