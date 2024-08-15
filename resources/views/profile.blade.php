@extends('template.layout')

@section('judul', 'Halaman Profile')
@section('dashboard', 'active')
@section('content')
   <div class="row py-5 px-4">
        <div class="col-md-12 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden p-3">
                <div class="px-4 py-3">
                    <img src="{{ asset('gambar/'.Auth::user()->sampul) }}" alt="{{ Auth::user()->sampul }}" style="width:100%;height:300px;">
                </div>
                <div class="px-4 pt-0 pb-4 cover">

                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src="{{ asset('gambar/'.Auth::user()->foto) }}" alt="{{ Auth::user()->foto }}" width="130" class="rounded mb-2 img-thumbnail">
                            <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modal">Edit Data</button>
                        </div>
                        <div class="media-body mb-5 text-black">
                                <h4 class="mt-0 mb-0">{{ Auth::user()->name }}</h4>
                                <p class="small mt-1"><i class="fas fa-envelope mr-2"></i> {{ Auth::user()->email }}</p>
                                <p class="small"><i class="fas fa-id-card mr-2"></i>{{ Auth::user()->nik }}</p>
                                <!-- Modal -->
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id User</label>
                    <input type="email" class="form-control" value="{{ Auth::user()->id_user }}" placeholder="Enter email" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}" placeholder="Enter Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter email">

                  </div>
                  <div class="form-group">
                    <label>Foto Profile</label>
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Foto Sampul</label>
                    <input type="file" name="sampul" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Tinggi Harus 300px</small>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="kirim" class="btn btn-primary">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- end modal --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
