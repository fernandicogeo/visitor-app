@extends('dashboard.user.partials.main')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajukan Pertemuan</h1>
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
      <div class="container-mid">
        <div class="row-mid mt-5">
          <div class="card">
            <div class="card-body">
              <form class="login100-form validate-form" action="/schedule" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label><span class="req">*</span>
                    <small>Tanggal pertemuan minimal besok</small>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label><span class="req">*</span>
                    <select class="form-select @error('waktu') is-invalid @enderror" id="waktu" name="waktu" required>
                        <option selected></option>
                        <option value="pagi (09.00 - 11.00)">Pagi (09.00 - 11.00)</option>
                        <option value="siang (14.00 - 16.00)">Siang (14.00 - 16.00)</option>
                    </select>
                    @error('waktu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label><span class="req">*</span>
                    <select class="form-select @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" required>
                      <option selected></option>
                      <option value="Angkutan Barang">Angkutan Barang</option>
                      <option value="Angkutan dan Fasilitas Penumpang">Angkutan dan Fasilitas Penumpang</option>
                      <option value="Hukum">Hukum</option>
                      <option value="Humasda">Humasda</option>
                      <option value="Jalan Rel & Jembatan">Jalan Rel & Jembatan</option>
                      <option value="Kesehatan">Kesehatan</option>
                      <option value="Keuangan">Keuangan</option>
                      <option value="Operasi">Operasi</option>
                      <option value="Pengamanan">Pengamanan</option>
                      <option value="Pengadaan Barang & Jasa">Pengadaan Barang & Jasa</option>
                      <option value="Penjagaan Aset & Komersialisasi non-angkutan">Penjagaan Aset & Komersialisasi non-angkutan</option>
                      <option value="Sarana">Sarana</option>
                      <option value="SDM">SDM</option>
                      <option value="Sintelis">Sintelis</option>
                      <option value="SI">SI</option>
                    </select>
                    @error('tujuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan</label><span class="req">*</span>
                    <input type="text" class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" required>
                    @error('keperluan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label><span class="req">*</span>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" required>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kendaraan" class="form-label">Kendaraan</label><span class="req">*</span>
                    <select class="form-select @error('kendaraan') is-invalid @enderror" id="kendaraan" name="kendaraan" required>
                        <option selected></option>
                        <option value="Pribadi">Pribadi</option>
                        <option value="Umum">Umum</option>
                        <option value="Online">Online</option>
                    </select>
                    @error('kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" id="jenis_kendaraan_field" style="display: none;">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label><span class="req">*</span>
                    <select class="form-select @error('jenis_kendaraan') is-invalid @enderror" id="jenis_kendaraan" name="jenis_kendaraan">
                        <option selected></option>
                        <option value="Roda 2">Roda 2</option>
                        <option value="Roda 4">Roda 4</option>
                    </select>
                    @error('jenis_kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3" id="nopol_kendaraan_field" style="display: none;">
                    <label for="nopol_kendaraan" class="form-label">Nomor Polisi</label><span class="req">*</span>
                    <input type="text" class="form-control @error('nopol_kendaraan') is-invalid @enderror" id="nopol_kendaraan" name="nopol_kendaraan">
                    @error('nopol_kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    document.getElementById('kendaraan').addEventListener('change', function() {
        var jenisKendaraanField = document.getElementById('jenis_kendaraan_field');
        var nopolField = document.getElementById('nopol_kendaraan_field');
        if (this.value === 'pribadi') {
            jenisKendaraanField.style.display = 'block';
            nopolField.style.display = 'block';
        } else {
            jenisKendaraanField.style.display = 'none';
            nopolField.style.display = 'none';
        }
    });
</script>
@endsection

  