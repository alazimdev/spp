@extends('layouts.app')

@section('subtitle', 'Transaksi Pembayaran')
@section('content')
<div class="modal" id="modal-default-large" tabindex="-1" role="dialog" aria-labelledby="modal-default-large"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Transaksi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pembayaran-store') }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="student_id">Siswa</label>
                                <select name="student_id" id="student_id" class="form-control" required>
                                    <option value="">===Pilih Siswa===</option>
                                    @foreach($student as $data)
                                    <option value="{{$data->id}}">[{{$data->nis}}] {{$data->full_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="spp_id">SPP</label>
                                <select name="spp_id" id="spp_id" class="form-control" required>
                                </select>
                                <p id="alert"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="date">Tanggal Pembayaran</label>
                                <input type="date" class="form-control bg-white" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="amount">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    placeholder="Jumlah Bayar" min="0" required>
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
<div class="modal" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default-large"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Transaksi Pembayaran SPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pembayaran-export') }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="spp_id">SPP Periode</label>
                                <select name="spp_id" id="spp_id" class="form-control" required>
                                    <option value="null">Semua SPP Periode</option>
                                    @foreach($spp as $data)
                                    <option value="{{$data->id}}">[{{$data->period}}] {{$data->nominal}}</option>
                                    @endforeach
                                </select>
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
                        Transaksi Pembayaran
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
                    <a data-toggle="modal" data-target="#modal-default" class="btn btn-success"><i class="fa fa-export"></i>Export</a><br/>
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table id="example" class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>SPP Periode</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah Bayar</th>
                                <th style="width: 15%;">Aksi</th>
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
                ajax: '{!! route('pembayaran-data') !!}',
                columns: [{
                        data: 'student_id',
                        name: 'student_id'
                    },
                    {
                        data: 'spp_id',
                        name: 'spp_id'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
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
    <script>
    $(document).ready(function () {
        $( "#spp_id" ).prop( "disabled", true );
        $( "#date" ).prop( "disabled", true );
        $( "#amount" ).prop( "disabled", true );
        
        $('#student_id').on('change', function () {
            var idStudent = this.value;
            $("#spp_id").html('');
            $( "#spp_id" ).prop( "disabled", false );
            $( "#date" ).prop( "disabled", true );
            $( "#date" ).val("");
            $( "#amount" ).prop( "disabled", true );
            $( "#amount" ).val("");
            $('#alert').html('');
            $.ajax({
                url: "{!! route('pembayaran-spp') !!}",
                type: "POST",
                data: {
                    student_id: idStudent,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#spp_id').html('<option value="">==Pilih SPP===</option>');
                    $.each(result.spp, function (key, value) {
                        $("#spp_id").append('<option value="' + value
                            .id + '">[' + value.period + '] - '+ value.nominal +'</option>');
                    });
                },
            });
        });
        
        $('#spp_id').on('change', function () {
            var idSpp = this.value;
            var idStudent = $('#student_id').val();
            console.log(idStudent);
            $( "#date" ).prop( "disabled", false );
            $( "#date" ).val("");
            $( "#amount" ).prop( "disabled", false );
            $( "#amount" ).val("");
            $.ajax({
                url: "{!! route('pembayaran-payment') !!}",
                type: "POST",
                data: {
                    spp_id: idSpp,
                    student_id: idStudent,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#alert').html("Sisa hutang: Rp " + result);
                    $('#amount').attr({'max':result});
                },
            });
        });
    });
    </script>
@endsection