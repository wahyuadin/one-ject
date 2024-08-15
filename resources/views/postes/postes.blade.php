@extends('template.layout')
@section('judul','Halaman POST-TEST')
@section('post','active')

@section('content')
    <?php $pretes = DB::table('pretes')->count(); $postes = DB::table('postes')->count()?>
    <div class="container container-full">
        <div class="page-navs bg-white">
            <div class="">
                <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
                    <a class="nav-link" href="/pre">Pre Test
                        <span class="count ml-1">({{ $pretes }})</span>
                    </a>
                    <a class="nav-link active show" href="/post">Post Test
                        <span class="count ml-1">({{ $postes }})</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="text-center">
                <div class="dropdown">
                    <form action="" method="POST">
                        @csrf
                        <div class="row align-left-center">
                            <div class="col-md-5" style="text-align: right">
                              <label for="inputPassword6" class="col-form-label">Kategori :</label>
                            </div>
                            <div class="col-auto">
                              <select class="form-control" name="kategori">
                                <option selected disabled>==== Pilih Salah Satu ====</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-auto">
                              <button type="submit" name="filter" class="btn btn-primary btn-sm rounded">Submit</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $d)
                <?php $sql = DB::table('users')->where('id_user',$d->id_user)->first();?>
                <div class="col-md-3 col-sm-12 mb-3">
                    <div class="card">
                        <img src="{{ asset('gambar/'.$d->gambar) }}" class="card-img-top" alt="{{ $d->gambar }}">
                        <div class="card-body">
                            <div class="card-title"><h2><b>{{ $d->nama }}</b></h2></div>
                            <p>{{ $d->kategori }}</p>
                            <p>Diposting oleh: {{ $sql->name }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-sm" href="{{ $d->link }}" class="card-link">Lihat</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
