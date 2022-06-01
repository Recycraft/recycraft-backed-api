@extends('admin.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('scrap.index') }}">Scrap Categories</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title">General</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Project Name</label>
            <input type="text" id="inputName" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputDescription">Project Description</label>
            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label for="inputStatus">Status</label>
            <select id="inputStatus" class="form-control custom-select">
              <option selected disabled>Select one</option>
              <option>On Hold</option>
              <option>Canceled</option>
              <option>Success</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputClientCompany">Client Company</label>
            <input type="text" id="inputClientCompany" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputProjectLeader">Project Leader</label>
            <input type="text" id="inputProjectLeader" class="form-control">
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
