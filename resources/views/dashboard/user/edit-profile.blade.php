@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Profil</h1>
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
        <div class="row-mid mb-5" style="width: 15vw;">
            <img src="img/profil.png" class="card-img-top" alt="...">
        </div>
        <div class="row-mid">
            <form class="login100-form validate-form" action="/edit-profile" method="post" enctype="multipart/form-data">
                @csrf
                {{-- NAMA --}}
                <div class="wrap-input100 validate-input" data-validate = "Nama wajib diisi">
                    <input class="input100" type="text" name="nama" placeholder="Nama" value="<?= Auth::user()->nama; ?>" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-circle" style="color: darkgrey" aria-hidden="true"></i>
                    </span>
                </div>

                {{-- INSTANSI --}}
                <div class="wrap-input100 validate-input" data-validate = "Instansi wajib diisi">
                    <input class="input100" type="text" name="instansi" placeholder="Instansi" value="<?= Auth::user()->instansi; ?>" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-university" style="color: darkgrey" aria-hidden="true"></i>
                    </span>
                </div>

                {{-- NOMOR HP --}}
                <div class="wrap-input100 validate-input" data-validate = "Nomor HP wajib diisi">
                    <input class="input100" type="text" name="nomor_hp" placeholder="Nomor HP" value="<?= Auth::user()->nomor_hp; ?>" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" style="color: darkgrey" aria-hidden="true"></i>
                    </span>
                </div>

                {{-- NIK --}}
                <div class="wrap-input100 validate-input" data-validate = "NIK wajib diisi">
                    <input class="input100" type="text" name="nik" placeholder="NIK" value="<?= Auth::user()->nik; ?>" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-id-card" style="color: darkgrey" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn mb-5" type="submit">
                        Edit Profil
                    </button>
                </div>
            </form>
        </div>
      </div>
    </section>
  </div>
@endsection

  