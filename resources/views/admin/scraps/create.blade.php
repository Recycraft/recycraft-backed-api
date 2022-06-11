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
      @if (session()->has('error'))
        {{ session('error') }}
      @endif
      <form action="{{ route('scrap.store') }}" method="POST">
      @csrf
        <div class="card card-dark">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            @error('name')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
            </div>
            @error('slug')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputDescription">Category Description</label>
              <textarea id="summernote" name="desc">
                {{ old('desc', 'Description') }}</textarea>
            </div>
            @error('desc')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="image">Picture</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
              <img src="" alt="" class="img-preview img-fluid mt-1 col-6 col-sm-4 col-lg-2">
            </div>
            @error('image')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputStatus">Type</label>
              <select id="inputStatus" name="type" class="form-control custom-select">
                <option selected>Select one</option>
                @foreach ($scrapType as $type)
                  <option value="{{ $type->value }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
            @error('type')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <!-- /.card-body -->
        </div>
      </form>
      <!-- /.card -->
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    name.addEventListener('change', function() {
      fetch('/admin/scrap/checkSlug?category=' + name.value)
        .then(response => response.json()).then(data => slug
          .value = data.slug)
    });
  </script>
@endsection
