@extends('layouts.app')

@section('subtitle', 'Siswa')
@section('content')
    <div class="modal" id="modal-default-large" tabindex="-1" role="dialog" aria-labelledby="modal-default-large"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('siswa-store') }}" method="POST" onsubmit="return true;">
                    @csrf
                    <div class="modal-body pb-1">

                        <!-- Basic Elements -->
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Username"
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
                                    <label for="phone_number">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="Nomor Handphone" min="0" max="9999999999999999" required>
                                    <p>Contoh: 0851xx</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN"
                                        min="0" max="9999999999" required>
                                    <p>Contoh: 11002391xxxx</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="number" class="form-control" id="nis" name="nis"
                                        placeholder="NIS"min="0" max="999999999" required>
                                    <p>Contoh: 1707xxx</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="date" class="form-control bg-white" id="date_of_birth" name="date_of_birth" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="junior_high_school">Sekolah Asal</label>
                                    <input type="text" class="form-control" id="junior_high_school" name="junior_high_school"
                                        placeholder="Sekolah Asal" required>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_entered">Bulan Masuk</label>
                                    <select name="month_entered" id="month_entered" class="form-control">
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
                                    <label for="year_entered">Tahun Masuk</label>
                                    <input type="number" class="form-control" id="year_entered" name="year_entered"
                                        placeholder="Tahun Masuk"min="0" max="9999" required>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_end">Bulan Keluar/Tamat (opsi)</label>
                                    <select name="month_end" id="month_end" class="form-control">
                                        <option value="">=== Pilih ===</option>
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
                                    <label for="year_end">Tahun Keluar/Tamat (opsi)</label>
                                    <input type="number" class="form-control" id="year_end" name="year_end"
                                        placeholder="Tahun Keluar/Tamat"min="0" max="9999">
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <p>*Note: Untuk pembayaran SPP akan dimulai dan dihitung dari bulan tahun masuk dan bulan tahun keluar. Jadi, tolong perhatikan data dengan baik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label for="class_id">Kelas</label>
                                    <select name="class_id" id="class_id" class="form-control" required>
                                        @foreach($classes as $data)
                                        <option value="{{$data->id}}">{{$data->name}} - {{$data->departement}}</option>
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
                        Siswa
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
            <div class="block block-rounded table-responsive" style="width: 100%">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table id="example" class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Nomor Handphone</th>
                                <th>Dibuat pada</th>
                                <th>Terakhir diedit</th>
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
                responsive   : true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('siswa-data') !!}',
                columns: [{
                        data: 'nisn',
                        name: 'nisn',
                        render:function(data, type, row){
                            return "<a href='/siswa/"+ row.nisn +"'>" + row.nisn + "</a>"
                        }
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number'
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
                        className: 'dt-body-right',
                        width: '100px',
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
