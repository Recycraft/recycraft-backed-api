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
              <li class="breadcrumb-item"><a href="{{ secure_url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ secure_url('handicraft.index') }}">Handicrafts</a></li>
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
          <form action="{{ secure_url('handicraft.update', ['handicraft' => $handicraft->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $handicraft->title) }}">
            </div>
            @error('title')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $handicraft->slug) }}">
            </div>
            @error('slug')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputStatus">Category</label>
              <select id="inputStatus" name="scrap_category_id" class="form-control custom-select">
                <option selected value="{{ $handicraft->scrap_category->id }}">{{ $handicraft->scrap_category->name }}</option>
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
              <div class="input-group mb-2">
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
              <img src="" alt="" class="img-preview img-fluid mt-2 col-6 col-sm-4 col-lg-2">
            </div>
            @error('image')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <div class="form-group">
              <label for="inputDescription">Handicraft Description</label>
              <textarea id="summernote" name="desc">
                {{ old('desc', $handicraft->desc) }}
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
                {{ old('materials', $handicraft->materials) }}
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
                {{ old('process', $handicraft->process) }}
              </textarea>
            </div>
            @error('process')
              <div class="error invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <button type="submit" class="btn btn-warning">Update</button>
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
