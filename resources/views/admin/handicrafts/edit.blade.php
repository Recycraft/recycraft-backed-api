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
              <li class="breadcrumb-item"><a href="{{ route('handicraft.index') }}">Handicraft</a></li>
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
          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" id="title" name="title" class="form-control"
              value="{{ old('title', $handicraft->title) }}">
          </div>
          @error('title')
            <div class="error invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ $handicraft->slug }}" disabled>
          </div>
          <div class="form-group">
            <label for="summernote">Handicraft Description</label>
            <textarea id="summernote" name="desc">
              {{ $handicraft->desc }}
            </textarea>
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
            @if ($handicraft->image)
              <img src="{{ asset('storage/' . $handicraft->image) }}" alt=""
                class="img-preview img-fluid mb-3 col-6 col-sm-4 col-lg-2">
            @else
              <img src="" alt="" class="img-preview img-fluid mb-3 col-8 col-sm-4">
            @endif
            <img src="" alt="" class="img-preview img-fluid mt-1 col-6 col-sm-4 col-lg-2">
            @error('image')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
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
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function() {
      fetch('/admin/handicraft/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>
@endsection
