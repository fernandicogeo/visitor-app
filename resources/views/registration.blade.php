<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
<!--===============================================================================================-->
<style>
	#foto_ktp {
		color: grey;
		padding-top: 2.3vh;
	}
	input[type='file']::before {
        content: 'Foto KTP';
        color: #999999;
		padding-right: 1vw;
      }

	::file-selector-button {
		display: none;
	}
</style>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" style="
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				margin-top: -10vh;" data-tilt>
					<img src="/img/logovisitor.png" alt="IMG">
				</div>
 
				<form class="login100-form validate-form" action="/registration" method="post" enctype="multipart/form-data">
					@csrf
					<span class="login100-form-title">
						Registrasi
					</span>

					{{-- NAMA --}}
					<div class="wrap-input100 validate-input" data-validate = "Nama wajib diisi">
						<input class="form-control input100 @error('nama') is-invalid @enderror" type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
						@error('nama')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- EMAIL --}}
					<div class="wrap-input100 validate-input" data-validate = "Format email: ex@abc.xyz">
						<input class="form-control input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- PASSWORD --}}
					<div class="wrap-input100 validate-input" data-validate = "Password wajib diisi">
						<input class="form-control input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@error('password')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- INSTANSI --}}
					<div class="wrap-input100 validate-input" data-validate = "Instansi wajib diisi">
						<input class="form-control input100 @error('instansi') is-invalid @enderror" type="text" name="instansi" placeholder="Instansi" value="{{ old('instansi') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-university" aria-hidden="true"></i>
						</span>
						@error('instansi')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- NOMOR HP --}}
					<div class="wrap-input100 validate-input" data-validate = "Nomor HP wajib diisi">
						<input class="form-control input100 @error('nomor_hp') is-invalid @enderror" type="text" name="nomor_hp" placeholder="Nomor HP" value="{{ old('nomor_hp') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
						@error('nomor_hp')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- NIK --}}
					<div class="wrap-input100 validate-input" data-validate = "NIK wajib diisi">
						<input class="form-control input100 @error('nik') is-invalid @enderror" type="text" name="nik" placeholder="NIK" value="{{ old('nik') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card-o" aria-hidden="true"></i>
						</span>
						@error('nik')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>

					{{-- FOTO KTP --}}
					<div class="wrap-input100 validate-input" data-validate = "Foto KTP wajib diisi">
						<input class="form-control input100 @error('foto_ktp') is-invalid @enderror" id="foto_ktp" type="file" name="foto_ktp" placeholder="Foto KTP" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-camera" aria-hidden="true"></i>
						</span>
						@error('foto_ktp')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Buat Akun
						</button>
					</div>

					<div class="text-center p-t-40">
						<a class="txt2" href="/login">
                            Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
		$(function () {
			$('input[type="file"]').change(function () {
				if ($(this).val() != "") {
						$(this).css('color', '#999999');
				}else{
						$(this).css('color', '#999999');
				}
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="/js/main.js"></script>

</body>
</html>