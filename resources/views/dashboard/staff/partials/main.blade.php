<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/css/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/css/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/css/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/css/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
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
  <link rel="stylesheet" href="/css/admin/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="/css/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/css/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/css/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/css/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="/css/admin/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="icon" href="/img/pertamina.png">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <style>
    .icon-button {
      border: none;
      background-color: transparent;
      padding: 2;
      margin: 2;
      cursor: pointer;
    }
    .icon-button lord-icon {
      display: block;
      width: 25px;
      height: 25px;
    }
    .form-required {
      color: #F91F2E;
      margin-bottom: -10px;
    }

    .card-header {
      border: none;
      margin-bottom: 10px;
    }

    div.stars {

        display: inline-block;

    }

    .mt-200{
        margin-top:200px;
    }

    input.star { display: none; }

    label.star {

        float: right;

        padding: 5px;

        font-size: 25px;

        color: #005fa2;

        transition: all .2s;

    }

    input.star:checked ~ label.star:before {

        content: '\f005';

        color: #FD4;

        transition: all .25s;

    }

    input.star-5:checked ~ label.star:before {

        color: #FE7;

        text-shadow: 0 0 20px #952;

    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {

        content: '\f006';

        font-family: FontAwesome;
    }

    .nav-sidebar p, i {
        color: rgb(255, 255, 255);
    }
    .container-mid {
        height: 100%; /* 100% of the viewport height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Optional: Center text in each row */
    .row-  {
        text-align: center;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/img/logokai.png" alt="AdminLTELogo" width="200">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: grey"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color: grey"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link btn btn-default">
            <i class="nav-icon fas fa-sign-out-alt" style="color: grey"></i>
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2D2A70">
      <a href="/dashboard-staff" class="brand-link logo-switch" style="text-align: center; text-decoration:none;background-color: #fff" >
        <img src="/img/logovisitor.png" alt=" Logo" class="brand-image-xl logo-xl" style="width: 70%; object-fit: cover; left: 30px">
      </a>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="color: white">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          @auth
              <li class="nav-item">
                <a href="/schedule-staff" class="nav-link">
                    <i class="bi bi-calendar-check-fill"></i>
                  <p>
                    Jadwal Pertemuan Visitor
                  </p>
                </a>
              </li>
          @endauth

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('container')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/css/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/css/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/css/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/css/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/css/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/css/admin/plugins/sparklines/sparkline.js"></script>
<script src="/css/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/css/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/css/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/css/admin/plugins/moment/moment.min.js"></script>
<script src="/css/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/css/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/css/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/css/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/css/admin/dist/js/adminlte.js"></script>
<script src="/css/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/css/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/css/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/css/admin/plugins/jszip/jszip.min.js"></script>
<script src="/css/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/css/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/css/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/css/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/css/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/css/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/css/admin/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="/css/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/css/admin/plugins/raphael/raphael.min.js"></script>
<script src="/css/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/css/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
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

<script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>

<script>
  function changeold() {
      var x = document.getElementById('passold').type;
      if (x == 'password') {
          document.getElementById('passold').type = 'text';
          document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                          <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                          </svg>`;
      }
      else {
          document.getElementById('passold').type = 'password';
          document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>`;
      }
  }



</script>

<script>
  function changenew() {
      var x = document.getElementById('passnew').type;
      if (x == 'password') {
          document.getElementById('passnew').type = 'text';
          document.getElementById('mybuttonnew').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                          <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                          </svg>`;
      }
      else {
          document.getElementById('passnew').type = 'password';
          document.getElementById('mybuttonnew').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                          </svg>`;
      }
  }
</script>



<script>
    
</script>
  <script>
    $(document).ready(function () {
  var url = window.location;
  $('ul.nav-sidebar a.nav-link').filter(function () {
    return this.href == url;
  }).addClass('active');
});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



</body>
</html>
