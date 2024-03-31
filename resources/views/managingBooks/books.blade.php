@extends('index')
@section('container')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">BOOKS MANAGEMENT</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/books">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Books
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</div>
  <div class="container-fluid">
    <div class="row">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="pb-3">
                <form class="d-flex" action="" method="get">
                    <input class="form-control me-1" type="search" name="kunci" value="" placeholder="Masukkan kata kunci" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>

            <div class="pb-3">
                <a href='/books/create' class="btn btn-primary">+ Tambah Data</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-2">Name</th>
                        <th class="col-md-1">Slug</th>
                        <th class="col-md-1">Genre</th>
                        <th class="col-md-2">Author</th>
                        <th class="col-md-4">Sinopsis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->slug }}</td>
                        <td>{{ $d->genre->name }}</td>
                        <td>{{ $d->author }}</td>
                        <td>{{ $d->sinopsis }}</td>
                        <td>
                            <a href='{{ url('books/'.$d->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('books/'.$d->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection
