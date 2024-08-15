@extends('template.layout')
@section('judul','Halaman Dashboard')
@section('dashboard','active')
@section('notif')
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
@endsection


@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-3 pb-4">
        <div>
            <h2 class="pb-2 fw-bold">@yield('judul')</h2>
            <h5 class="op-7 mb-2">Selamat Datang <b>{{ Auth::user()->name }}</b></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-user"></i>
                                <!-- <i class="flaticon-chart-pie text-warning"></i> -->
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">User</p>
                                <h4 class="card-title">{{ $user }} Akun</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Jadwal</p>
                                <h4 class="card-title">{{ $kalender }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-copy"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pre Test</p>
                                <h4 class="card-title">{{ $pretes }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-paper-plane"></i>
                                <!-- <i class="flaticon-error text-danger"></i> -->
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Post Test</p>
                                <h4 class="card-title">{{ $postes }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <!-- front -->
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <h4 class="card-title">Jadwal Pelatihan</h4>
                    </div>
                    <p class="card-category">
                    PT OneJect Tahun 2023</p><br>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" name="pdf" class="btn btn-warning btn-sm"><i class="fas fa-print"></i> Print</button>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead class="table table-head-bg-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Deadline</th>
                        </tr>
                    </thead>
                    <?php $no=1;?>
                    @foreach ($data as $d)
                    <tbody>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->start }}</td>
                            <td>{{ $d->end }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end -->

@endsection

