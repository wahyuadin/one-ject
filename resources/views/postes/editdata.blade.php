@extends('template.layout')
@section('judul','Halaman Edit Data')
@section('data','active')

@section('content')
<div class="page-inner">
    <div class="container p-3">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-3 pb-4">
            <div>
                <h2 class="pb-2 fw-bold">@yield('judul')</h2>
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
        <form class="row g-3" method="POST" action="" enctype="multipart/form-data">
            @csrf
            @foreach ($data as $d)
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">ID User</label>
              <input type="text" name="id_user" value="{{ $d->id_user }}" class="form-control" readonly>
              <input type="text" name="id" value="{{ $d->id }}" class="form-control" hidden>
              <input type="text" name="id_tes" value="{{ $d->id_tes }}" class="form-control" hidden>
            </div>
            <div class="col-6">
              <label for="inputAddress" class="form-label">Nama</label>
              <input type="text" name="nama" value="{{ $d->nama }}" class="form-control" id="inputAddress" placeholder="Masukan Nama Kategori">
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Kategori</label>
                <select name="kategori" class="form-select" aria-label="Default select example">
                    <option disabled selected>Pilih Salah Satu</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Type Tes</label>
                <input type="text" name="typetes" value="{{ $d->tes }}" class="form-control" readonly>
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Gambar</label>
                <input type="file" name="gambar" value="{{ $d->gambar }}" class="form-control" id="inputAddress">
                <small>Type gambar: jpg, png</small>
              </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Alamat Tes</label>
              <textarea name="link" class="form-control" cols="30" rows="10">{{ $d->link }}</textarea>
            </div>
            <div class="col-12 mt-3">
              <button type="submit" name="kirim" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          @endforeach
    </div>

</div>
@endsection
