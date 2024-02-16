@extends('dashboard.manager.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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

        <div class="row mb-5">
          {{-- <div class="col-lg-4 mr-5" style="width: 10rem;">
            <a href="/schedule-manager" style="text-decoration: none; color: black">
              <img src="/img/schedule-staff.png" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-text mt-1 fs-6">Jadwal Pertemuan Visitor</h5>
              </div>
            </a>
          </div> --}}
          <div class="col-lg-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pengajuan masuk</span>
                  <span class="info-box-number">
                    {{ $schedulesCount }}
                    <small>pengajuan</small>
                  </span>
                </div>
              </span>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-id-card" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Pengunjung</span>
                  <span class="info-box-number">
                    {{ $pengunjungCount }}
                    <small>kali</small>
                  </span>
                </div>
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        </div>
      </div>
    </section>
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Grafik</h1>
          </div>
        </div>
      </div>
    </div>
    <p>
  </p>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-body text-center">
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Grafik Total Pengajuan Divisi {{ Auth::user()->divisi }} Tahun {{ date("Y") }}</h3>
                      <div class="card-tools">
                        <button
                          type="button"
                          class="btn btn-tool"
                          data-card-widget="collapse"
                        >
                          <i class="fas fa-minus"></i>
                        </button>
                        <button
                          type="button"
                          class="btn btn-tool"
                          data-card-widget="remove"
                        >
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas
                          id="barChart"
                          style="
                            min-height: 250px;
                            height: 250px;
                            max-height: 250px;
                            max-width: 100%;
                          "
                        ></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @php
  $datasetAcc = [];
  $datasetReschedule = [];
  $datasetReject = [];
  foreach ($bulan as $kodeBulan => $namaBulan) {
      $countSchedulesAcc = 0;
      $countSchedulesReschedule = 0;
      $countSchedulesReject = 0;

      foreach ($schedulesAcc as $scheduleAcc) {
          if (date('m', strtotime($scheduleAcc->tanggal)) == $kodeBulan) {
              $countSchedulesAcc++;
          }
      }

      foreach ($schedulesReschedule as $scheduleReschedule) {
          if (date('m', strtotime($scheduleReschedule->tanggal)) == $kodeBulan) {
              $countSchedulesReschedule++;
          }
      }

      foreach ($schedulesReject as $scheduleReject) {
          if (date('m', strtotime($scheduleReject->tanggal)) == $kodeBulan) {
              $countSchedulesReject++;
          }
      }
      $datasetAcc[$namaBulan] = $countSchedulesAcc;
      $datasetReschedule[$namaBulan] = $countSchedulesReschedule;
      $datasetReject[$namaBulan] = $countSchedulesReject;
  }
@endphp

<script>
  $(function () {

    var areaChartData = {
      labels: [
        @foreach ($bulan as $namaBulan)
          "{{ $namaBulan }}",
        @endforeach
      ],
      datasets: [
        {
          label: "Accept",
          backgroundColor: "rgba(40, 167, 69, 0.9)",
          borderColor: "rgba(40, 167, 69, 0.8)",
          pointRadius: false,
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(40, 167, 69, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(40, 167, 69, 1)",
          data: [
            @foreach ($datasetAcc as $count)
              {{ $count }},
            @endforeach,
            0
          ],
        },
        {
          label: "Reschedule",
          backgroundColor: "rgba(255, 193, 7, 0.9)",
          borderColor: "rgba(255, 193, 7, 0.8)",
          pointRadius: false,
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(255, 193, 7, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255, 193, 7, 1)",
          data: [
            @foreach ($datasetReschedule as $count)
              {{ $count }},
            @endforeach,
            0
          ],
        },
        {
          label: "Reject",
          backgroundColor: "rgba(220, 53, 69, 0.9)",
          borderColor: "rgba(220, 53, 69, 0.8)",
          pointRadius: false,
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(220, 53, 69, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220, 53, 69, 1)",
          data: [
            @foreach ($datasetReject as $count)
              {{ $count }},
            @endforeach,
            0
          ],
        },
      ],
    };

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChartData = $.extend(true, {}, areaChartData);
    var temp0 = areaChartData.datasets[0];
    barChartData.datasets[0] = temp0;

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false,
    };

    new Chart(barChartCanvas, {
      type: "bar",
      data: barChartData,
      options: barChartOptions,
    });
  });
</script>
@endsection

  