@extends('index')

@section('container')
<div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">BOOKS MANAGEMENT | CREATE</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Books
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Create
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</div>
  <div class="container-fluid">
    <div class="row">
        <form action='{{ url('books') }}' method='post'>
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href='{{ url('books') }}' class="btn btn-secondary"><< kembali</a>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}" id="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="slug" class="col-sm-2 col-form-label">slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='slug' value="{{ Session::get('slug') }}" id="slug">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="genre" class="col-sm-2 col-form-label">genre</label>
                    <div class="col-sm-10">
                        <select name="genre" id="genre" value="{{ Session::get('genre') }}">
                            @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="author" class="col-sm-2 col-form-label">author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='author' value="{{ Session::get('author') }}" id="author">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sinopsis" class="col-sm-2 col-form-label">sinopsis</label>
                    <div class="col-sm-10">
                        <textarea name="sinopsis" class="form-control" id="sinopsis" value="{{ Session::get('sinopsis') }}" cols="100%" rows="10"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>
    </div>
  </div>

@endsection
