@extends('dashboard.satpam.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
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
          @foreach ($divisions as $division)
              <div class="col-lg-3">
                @if($title != 'Rekapan Data Pengunjung')
                  <a href="{{ route('division-schedule-satpam', $division->slug) }}" style="text-decoration: none; color: black">
                @else
                  <a href="{{ route('division-total-schedule-satpam', $division->slug) }}" style="text-decoration: none; color: black">
                @endif
                      <div class="card">
                          <div class="card-body text-center">
                              <h3 class="card-text">{{ $schedules->where('tujuan', $division->nama)->count() }}</h3>
                              <p class="card-text">Visitor</p>
                              <p class="card-text">{{ $division->nama }}</p>
                          </div>
                      </div>
                  </a>
              </div>
          @endforeach
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

  