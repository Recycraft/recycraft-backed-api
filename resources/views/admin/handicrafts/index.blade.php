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
          <div class="card-header">
            <h3 class="card-title">Handicrafts</h3>
            <div class="card-tools">
              <a href="{{ route('handicraft.create') }}" class="btn bg-teal">Add new</a>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th class="col-lg-3 col-sm-4 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($handicrafts as $handicraft)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $handicraft->title }}</td>
                    <td>{{ $handicraft->scrap_category->name }}</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <a href="{{ route('handicraft.show', ['handicraft' => $handicraft->slug]) }}"
                          class="btn bg-info"><i class="fas fa-info-circle"></i></a>
                        <a href="{{ route('handicraft.edit', ['handicraft' => $handicraft->slug]) }}"
                          class="btn bg-warning"><i class="fas fa-edit"></i></a>
                        <form method="post"
                          action="{{ route('handicraft.destroy', ['handicraft' => $handicraft->slug]) }}">
                          @csrf @method('delete')
                          <button type="submit" class="btn bg-danger" onclick="return confirm('Are you sure?')"><i
                              class="fas fa-trash"></i></button>
                        </form>
                      </div>
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
