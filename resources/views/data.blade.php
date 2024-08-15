@extends('template.layout')
@section('judul','Data Test')
@section('data','active')

@section('content')
<style>
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}
    </style>
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-3 pb-4">
        <div>
            <h2 class="pb-2 fw-bold">Master @yield('judul')</h2>
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

    <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-sm rounded mb-2" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus"></i> Tambah Data
</button>
{{-- button modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah @yield('judul')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group form-group-default">
                            <label>ID User</label>
                            <input name="id_user" value="{{ Auth::user()->id_user }}" type="text" class="form-control" placeholder="ID USER" readonly>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Nama</label>
                            <input name="nama" value="{{ old('nama') }}" type="text" class="form-control" placeholder="Masukan Data Baru">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Type Tes</label>
                            <select name="type_tes" class="form-control" aria-label="Default select example">
                                <option disabled selected>Pilih Salah Satu</option>
                                <option value="post">Post Test</option>
                                <option value="pre">Pre Test</option>
                            </select>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control" aria-label="Default select example">
                                <option selected disabled>Pilih Salah Satu</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->nama }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Alamat Web Tes</label>
                            <textarea name="web_address" class="form-control">{{ old('web_address') }}</textarea>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Gambar*</label>
                            <input name="gambar" type="file" class="form-group" value="{{ old('gambar') }}">
                            <small>Format : jpg, png</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </form>
	</div>
</div>
{{-- end modal --}}


<div style="overflow-x:auto;" class="p-4 mt-4">
    <table>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Type Test</th>
        <th>Kategori</th>
        <th>Alamat Tes</th>
        <th>Gambar</th>
        <th>Penangung Jawab</th>
        <th>Action</th>
      </tr>
      <?php $no=1;?>
      @foreach ($data as $d)
      <tr>
          <th>{{ $no++ }}</th>
          <td>{{ $d->nama }}</td>
          <td>{{ $d->tes }}</td>
          <td>{{ $d->kategori }}</td>
          <td>{{ $d->link }}</td>
          <td><img src="{{ asset('gambar/'.$d->gambar) }}" alt="" height="100" class="p-3"></td>
          <?php $query = DB::table('users')->where('id_user',$d->id_user)->first();?>
          <td>{{ $query->name }}</td>
          <td class="d-flex justify-content-center gap-1 mt-4">
              <a href="data/edit/{{ $d->id }}" class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i> Edit</a>
              <a href="data/hapus/{{ $d->id_tes }}" onclick="return confirm_delete()" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash"></i> Hapus</a>
          </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<script type="text/javascript">
    function confirm_delete() {
      return confirm('Apakah Anda Yakin?');
    }
    </script>
@endsection
