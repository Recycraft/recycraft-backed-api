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
        <div class="card-body">
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $scrap->name) }}">
          </div>
          @error('name')
            <div class="error invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $scrap->slug) }}">
          </div>
          @error('slug')
            <div class="error invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div class="form-group">
            <label for="summernote">Category Description</label>
            <textarea id="summernote" name="desc">
              {{ $scrap->desc }}
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
            @if ($scrap->image)
                <img src="{{ asset("storage/" . $scrap->image) }}" alt="" class="img-preview img-fluid mb-3 col-6 col-sm-4 col-lg-2">
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
          <div class="form-group">
            <label for="inputStatus">Type</label>
            <select id="inputStatus" name="type" class="form-control custom-select">
              <option selected {{ $scrap->type ? $scrap->type->value : '' }}>{{ $scrap->type ? $scrap->type->name : 'Select one' }}</option>
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
