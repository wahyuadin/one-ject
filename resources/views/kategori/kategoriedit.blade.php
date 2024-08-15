@extends('template.layout')
@section('judul','Halaman Kategori')
@section('kategori','active')

@section('content')
<div class="page-inner">
    <div class="container p-3">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-3 pb-4">
            <div>
                <h2 class="pb-2 fw-bold">Edit @yield('judul')</h2>
                <h5 class="op-7 mb-2">Berlaku Untuk Pre Test & Post Test</h5>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form class="row g-3" method="POST" action="simpan">
            @csrf

            @foreach ($data as $d)
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">ID User</label>
              <input type="text" name="id" value="{{ $d->id }}" readonly hidden>
              <input type="text" name="id_user" value="{{ $d->id_user }}" class="form-control" readonly>
            </div>
            <div class="col-6">
              <label for="inputAddress" class="form-label">Nama Kategori</label>
              <input type="text" name="nama" value="{{ $d->nama }}" class="form-control" id="inputAddress" placeholder="Masukan Nama Kategori">
            </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          @endforeach
    </div>

</div>
@endsection
