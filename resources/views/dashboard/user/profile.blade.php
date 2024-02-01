@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profil Diri</h1>
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
      <div class="container-mid text-center">
        <div class="row-mid" style="width: 15vw;">
            <img src="img/profil.png" class="card-img-top" alt="...">
        </div>
        <div class="row-mid mb-5">
            <h3 class="mt-2 mb-3">Nama : <?= Auth::user()->nama; ?></h3>
            <p>Email : <?= Auth::user()->email; ?></p>
            <p>Instansi : <?= Auth::user()->instansi; ?></p>
            <p>Nomor HP : <?= Auth::user()->nomor_hp; ?></p>
            <p>NIK : <?= Auth::user()->nik; ?></p>
            <p>Foto KTP : <a href="{{ asset('storage/'. Auth::user()->foto_ktp ) }}" target="_blank" <i class="bi bi-images" style="color: #2D2A70"></i></a></p>
            <a href="/edit-profile" style="color: grey; text-decoration: none;">Edit Profil <i class="bi bi-pencil-square" style="color: grey"></i></a>
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

  