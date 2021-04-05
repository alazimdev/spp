@extends('layouts.app')

@section('subtitle', 'SPP')
@section('content')
    <div class="modal" id="modal-default-large" tabindex="-1" role="dialog" aria-labelledby="modal-default-large"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data SPP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('spp-store') }}" method="POST" onsubmit="return true;">
                    @csrf
                    <div class="modal-body pb-1">

                        <!-- Basic Elements -->
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="period">Periode</label>
                                    <input type="text" class="form-control" id="period" name="period" placeholder="Periode"
                                        required>
                                    <p>Contoh: 2018/2019 atau 2019</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_start">Bulan Mulai Bayar</label>
                                    <select name="month_start" id="month_start" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_start">Tahun Mulai Bayar</label>
                                    <input type="number" class="form-control" id="year_start" name="year_start"
                                        placeholder="Tahun Mulai Bayar"min="0" max="9999" required>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_end">Bulan Terakhir Bayar</label>
                                    <select name="month_end" id="month_end" class="form-control">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_end">Tahun Terakhir Bayar</label>
                                    <input type="number" class="form-control" id="year_end" name="year_end"
                                        placeholder="Tahun Terakhir Bayar"min="0" max="9999" required>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nominal">Nominal Bayar Perbulan</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Nominal Bayar Perbulan"
                                        min="1" required>
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Elements -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        SPP
                    </h1>
                </div>
                <div class="mt-4 mt-md-0">
                    <a class="btn btn-sm btn-alt-primary push" data-toggle="modal" data-target="#modal-default-large">
                        <i class="fa fa-plus-circle"> Create</i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table id="example" class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Nominal</th>
                                <th>Mulai - Terakhir Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
            <!--  -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
@section('js')
    <script>
        $(function() {
            //$('#example1').DataTable()
            var table = $('#example').DataTable({
                //   'paging'      : true,
                //   'lengthChange': true,
                //   'searching'   : true,
                //   'ordering'    : true,
                //   'info'        : true,
                //   'autoWidth'   : true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('spp-data') !!}',
                columns: [{
                        data: 'period',
                        name: 'period'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal'
                    },
                    {
                        data: 'start_end',
                        name: 'start_end'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: true,
                        className: 'dt-body-right'
                    }
                ],
                "language": {
                    "lengthMenu": "Menampilkan _MENU_ records per halaman",
                    "zeroRecords": "Tidak menemukan data apapun - maaf",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak menemukan data apapun",
                    "infoFiltered": "(difilter dari _MAX_ total records)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "loadingRecords": "Memuat...",
                    "processing": "Proses...",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                    "aria": {
                        "sortAscending": ": aktifkan untuk mengurutkan kolom naik",
                        "sortDescending": ": aktifkan untuk mengurutkan kolom turun"
                    }
                }
            })
        });
    </script>
@endsection
