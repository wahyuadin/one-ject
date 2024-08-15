@extends('template.layout')
@section('judul','Data User')
@section('user','active')

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
<div class="container p-1 mt-4">
    <div style="overflow-x:auto;" class="p-4 mt-4">
        <table>
            <?php $no = 1;?>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>ID User</th>
              <th>email</th>
              <th>NIK</th>
              <th>Section</th>
              <th>Rule</th>
              <th>Action</th>
            </tr>
          @foreach ($data as $d)
          <tr>
            <th>{{ $no++ }}</th>
            <td>{{ $d->name }}</td>
            <td>{{ $d->id_user }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->nik }}</td>
            <td>{{ $d->section }}</td>
            <td>{{ $d->rule }}</td>
            <td>
                <a href="user/edit/{{ $d->id }}" class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i> Edit</a>
                <a href="user/hapus/{{ $d->id }}" onclick="return confirm_delete()" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash"></i> Hapus</a>
            </td>
        </tr>
          @endforeach
        </table>
      </div>
</div>
</div>
<script type="text/javascript">
    function confirm_delete() {
      return confirm('Apakah Anda Yakin?');
    }
    </script>
@endsection
