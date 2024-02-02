<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<!--===============================================================================================-->
<style>
    .container-mid {
        height: 100%; /* 100% of the viewport height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>
</head>
<body>
	
    <section class="content">
        <div class="container-mid">
          <div class="row-mid">
            <div class="card mt-5">
              <div class="card-body">
                <h3>Lupa Password</h3>
                <form class="login100-form validate-form mt-3" action="/process-forget-password" method="post" enctype="multipart/form-data">
                    @csrf
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
                    <button type="submit" class="btn btn-primary mt-2">Kirim Email</button>
                </form>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Kembali ke
                    </span>
                    <a class="txt2" href="/login">
                        Login
                    </a>
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
	
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
<!--===============================================================================================-->
	<script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (session()->has('pesan'))
    <script>
    toastr.success("{{ session('pesan') }}");
    </script>
    @elseif (session()->has('pesanSalah'))
    <script>
    // toastr.options = {
    // "positionClass": "toast-top-center",
    // }
    toastr.error("{{ session('pesanSalah') }}");
    </script>
    @elseif (session()->has('pesanInfo'))
    <script>
    // toastr.options = {
    // "positionClass": "toast-top-center",
    // }
    toastr.warning("{{ session('pesanInfo') }}");
    </script>
    @endif

</body>
</html>