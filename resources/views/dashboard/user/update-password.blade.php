@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Password</h1>
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
            <img src="/img/profil.png" class="card-img-top" alt="...">
        </div>
        <div class="row-mid">
            <form class="login100-form validate-form" action="/update-password" method="post" enctype="multipart/form-data">
                @csrf
                {{-- PASSWORD LAMA --}}
                <div class="mb-3">
                    <label for="oldPass" class="form-label">Password Lama</label>
                    <input type="password" class="form-control" id="oldPass" name="oldPass">
                  </div>

                {{-- PASSWORD BARU --}}
                <div class="mb-3">
                    <label for="newPass" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="newPass" name="newPass">
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn mb-5" type="submit">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
      </div>
    </section>
  </div>
@endsection

  