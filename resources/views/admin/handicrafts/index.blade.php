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
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="card">
          {{-- <div class="card-header"></div> --}}
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  {{-- <th>Description</th> --}}
                  <th>Category</th>
                  {{-- <th>Materials</th>
                  <th>Process</th> --}}
                  {{-- <th>Image</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($handicrafts as $handicraft)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $handicraft->title }}</td>
                    {{-- <td>{{ $handicraft->desc }}</td> --}}
                    <td>Ini Kategori nanti</td>
                    {{-- <td><img src="{{ $handicraft->image }}" alt="{{ $handicraft->name }}"></td> --}}
                    <td>
                      <a href="/dashboard/handicrafts/{{ $handicraft->id }}/show" class="badge bg-info"><span
                          data-feather="edit"></span>Show</a>
                      <a href="/dashboard/handicrafts/{{ $handicraft->id }}/edit" class="badge bg-warning"><span
                          data-feather="edit"></span>Edit</a>
                      <form action="/dashboard/handicrafts/{{ $handicraft->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" type="submit"
                          onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>

      </div>

  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
