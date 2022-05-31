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
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                  <th>Name</th>
                  <th class="col-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($scraps as $scrap)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $scrap->name }}</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <a href="/admin/products/{{ $scrap->slug }}" class="btn bg-info"><i class="fas fa-info-circle"></i></a>
                        <a href="/dashboard/scrap-categories/{{ $scrap->slug }}/edit" class="btn bg-warning"><i class="fas fa-edit"></i></a>
                        <form method="post" action="/dashboard/scrap-categories/{{ $scrap->slug }}">
                            @csrf @method('delete')
                            <button type="submit" class="btn bg-danger"
                                onclick="return confirm('Apakah anda yakin untuk menghapusnya ?')"><i
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
