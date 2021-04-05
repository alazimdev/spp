@extends('layouts.app')

@section('subtitle', 'Pengguna')
@section('content')
    <div class="modal" id="modal-default-large" tabindex="-1" role="dialog" aria-labelledby="modal-default-large"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengguna-store') }}" method="POST" onsubmit="return true;">
                    @csrf
                    <div class="modal-body pb-1">

                        <!-- Basic Elements -->
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="is_superuser">Jenis</label>
                                    <select class="form-control" id="is_superuser" name="is_superuser">
                                        <option value="0">Petugas</option>
                                        <option value="1">Admin</option>
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
                        Pengguna
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
                                <th>Nama lengkap</th>
                                <th>Email</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Jenis</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Dibuat pada</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Terakhir diedit</th>
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
                ajax: '{!! route('pengguna-data') !!}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'is_superuser',
                        name: 'is_superuser'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
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
                    "infoPostFix":