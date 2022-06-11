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
              <li class="breadcrumb-item"><a href="{{ secure_url('/admin/handicraft') }}">Handicrafts</a></li>
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
        <div class="card-body">
          <form action="{{ secure_url('/admin/handicraft/store') }}" , method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            @error('title')
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
              <label for="inputStatus">Category</label>
              <select id="inputStatus" name="scrap_category_id" class="form-control custom-select">
                <option selected>Select one</option>
                @foreach ($categories as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
            @error('scrap_category_id')
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
              <label for="inputDescription">Handicraft Description</label>
              <textarea id="summernote" name="desc">
                {{ old('desc', 'Description') }}
              </textarea>
            </div>
            @error('desc')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputDescription">Handicraft Materials</label>
              <textarea id="summernote2" name="materials">
                {{ old('materials', 'Materials') }}
              </textarea>
            </div>
            @error('materials')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputDescription">Handicraft Step by Step</label>
              <textarea id="summernote3" name="process">
                {{ old('process', 'Process') }}
              </textarea>
            </div>
            @error('process')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function() {
      fetch('/admin/handicraft/checkSlug?title=' + title.value)
        .then(response => response.json()).then(data => slug
          .value = data.slug)
    });
  </script>
@endsection
