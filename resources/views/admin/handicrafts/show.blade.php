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
              <li class="breadcrumb-item"><a href="{{ secure_url('/admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ secure_url('/admin/handicraft') }}">Handicraft</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{ $handicraft->title }}</h3>
              <div class="col-12">
                <img src="{{ asset('storage/' . $handicraft->image) }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $handicraft->title }}</h3>
              <h4>Slug</h4>
              <p>{{ $handicraft->slug }}</p>
            </div>
          </div>
          <h4>Description</h4>
          <p>{!! $handicraft->desc !!}</p>
          <hr>
          <h4>Materials</h4>
          <p>{!! $handicraft->materials !!}</p>
          <h4>Procedure</h4>
          <p>{!! $handicraft->process !!}</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
