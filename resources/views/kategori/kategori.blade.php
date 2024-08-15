@extends('template.layout')
@section('judul','Kategori')
@section('kategori','active')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-3 pb-4">
        <div>
            <h2 class="pb-2 fw-bold">Halaman @yield('judul')</h2>
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
        <form action="" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data @yield('judul')</h5>
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
                            <label>Nama Kategori</label>
                            <input name="nama" type="text" class="form-control" placeholder="Masukan Data Baru">
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

    <div class="container">
        <table class="table">
            <thead>
                <?php $no = 1;?>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($data as $d)
                <tbody>
                <tr>
                    <?php $sql = DB::table('users')->where('id_user',$d->id_user)->first()?>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $sql->name }}</td>
                    <td>
                        <a href="kategori/edit/{{ $d->id }}" class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i> Edit</a>
                        <a href="kategori/hapus/{{ $d->id }}" onclick="return confirm_delete()" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            </tbody>
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
