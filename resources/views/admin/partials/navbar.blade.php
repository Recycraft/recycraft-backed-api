<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ secure_url('/admin/dashboard') }}" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ secure_url('/admin/setting') }}" role="button">
        <i class="fas fa-user-cog"></i>
      </a>
    </li>
    <li class="nav-item">
      <form action="{{ secure_url('/logout') }}" method="post">
        <button type="submit" class="nav-link btn border-0 btn-dark">
          <i class="fas fa-sign-out-alt"></i>
        </button>
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
