@extends('layouts.app')

@section('subtitle', 'Dasbor')
@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="content">
        <div
            class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
            <div>
                <h1 class="h2 mb-1">
                    Dasbor
                </h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="row row-deck">
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">{{$users}}</div>
                        <div class="text-muted mb-3">Pengguna Admin dan Petugas yang telah diregistrasikan</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">{{$students}}</div>
                        <div class="text-muted mb-3">Total Siswa</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overview -->
        <div class="row row-deck">
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-chart-line text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">{{$payments}}</div>
                        <div class="text-muted mb-3">Banyak Data Transaksi</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-wallet text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">Rp {{number_format($total, 0, ",", ".")}}</div>
                        <div class="text-muted mb-3">Total dari seluruh pembayaran</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Overview -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection