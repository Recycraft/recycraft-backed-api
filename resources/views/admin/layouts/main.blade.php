<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recycraft - {{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ secure_asset('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ secure_asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ secure_asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ secure_asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ secure_asset('dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ secure_asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ secure_asset('plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ secure_asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ secure_asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- bs-custom-file-input -->
  <script src="{{ secure_asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ secure_asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote();
      $('#summernote2').summernote();
      $('#summernote3').summernote();
    });
    $(function () {
      bsCustomFileInput.init();
    });
    const images = document.querySelectorAll("input[type=file]")
    images.forEach((img, i) => {
      img.onchange = (e) => {
          const imgPreview = document.querySelectorAll(".img-preview")[i]
          const labels = document.querySelectorAll(".custom-file-label")[i]
          labels.innerText = e.target.files[0].name
          const fileReader = new FileReader()
          fileReader.readAsDataURL(e.target.files[0])
          fileReader.onload = (oFREvent) => {
          imgPreview.src = oFREvent.target.result
          }
      }
    })
  </script>
</body>

</html>
