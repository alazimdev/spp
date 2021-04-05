@extends('layouts.app')

@section('subtitle', 'Edit Data Siswa')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Edit Data Siswa
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <form action="{{ route('siswa-update', $student->id) }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                        <!-- Basic Elements -->
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                                        required value="{{$student->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required value="{{$student->email}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="phone_number">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="Nomor Handphone" min="0" max="9999999999999999" required value="{{$student->phone_number}}">
                                    <p>Contoh: 0851xx</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN"
                                        min="0" max="9999999999" required value="{{$student->nisn}}">
                                    <p>Contoh: 11002391xxxx</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="number" class="form-control" id="nis" name="nis"
                                        placeholder="NIS"min="0" max="999999999" required value="{{$student->nis}}">
                                    <p>Contoh: 1707xxx</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap"
                                        required value="{{$student->full_name}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Laki-Laki" @if($student->gender == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($student->gender == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="date" class="form-control bg-white" id="date_of_birth" name="date_of_birth" required value="{{$student->date_of_birth}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="junior_high_school">Sekolah Asal</label>
                                    <input type="text" class="form-control" id="junior_high_school" name="junior_high_school"
                                        placeholder="Sekolah Asal" required value="{{$student->junior_high_school}}">
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_entered">Bulan Masuk</label>
                                    <select name="month_entered" id="month_entered" class="form-control" {{$pay}}>
                                        <option value="01" @if($student->month_entered == '01') selected @endif>Januari</option>
                                        <option value="02" @if($student->month_entered == '02') selected @endif>Februari</option>
                                        <option value="03" @if($student->month_entered == '03') selected @endif>Maret</option>
                                        <option value="04" @if($student->month_entered == '04') selected @endif>April</option>
                                        <option value="05" @if($student->month_entered == '05') selected @endif>Mei</option>
                                        <option value="06" @if($student->month_entered == '06') selected @endif>Juni</option>
                                        <option value="07" @if($student->month_entered == '07') selected @endif>Juli</option>
                                        <option value="08" @if($student->month_entered == '08') selected @endif>Agustus</option>
                                        <option value="09" @if($student->month_entered == '09') selected @endif>September</option>
                                        <option value="10" @if($student->month_entered == '10') selected @endif>Oktober</option>
                                        <option value="11" @if($student->month_entered == '11') selected @endif>November</option>
                                        <option value="12" @if($student->month_entered == '12') selected @endif>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_entered">Tahun Masuk</label>
                                    <input type="number" class="form-control" id="year_entered" name="year_entered"
                                        placeholder="Tahun Masuk"min="0" max="9999" required value="{{$student->year_entered}}" {{$pay}}>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_end">Bulan Keluar/Tamat (opsi)</label>
                                    <select name="month_end" id="month_end" class="form-control">
                                        <option value="">=== Pilih ===</option>
                                        <option value="01" @if($student->month_end == '01') selected @endif>Januari</option>
                                        <option value="02" @if($student->month_end == '02') selected @endif>Februari</option>
                                        <option value="03" @if($student->month_end == '03') selected @endif>Maret</option>
                                        <option value="04" @if($student->month_end == '04') selected @endif>April</option>
                                        <option value="05" @if($student->month_end == '05') selected @endif>Mei</option>
                                        <option value="06" @if($student->month_end == '06') selected @endif>Juni</option>
                                        <option value="07" @if($student->month_end == '07') selected @endif>Juli</option>
                                        <option value="08" @if($student->month_end == '08') selected @endif>Agustus</option>
                                        <option value="09" @if($student->month_end == '09') selected @endif>September</option>
                                        <option value="10" @if($student->month_end == '10') selected @endif>Oktober</option>
                                        <option value="11" @if($student->month_end == '11') selected @endif>November</option>
                                        <option value="12" @if($student->month_end == '12') selected @endif>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_end">Tahun Keluar/Tamat (opsi)</label>
                                    <input type="number" class="form-control" id="year_end" name="year_end"
                                        placeholder="Tahun Keluar/Tamat"min="0" max="9999" value="{{$student->year_end}}">
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label for="class_id">Kelas</label>
                                    <select name="class_id" id="class_id" class="form-control" required>
                                        @foreach($classes as $data)
                                        <option value="{{$data->id}}" @if($student->class_id == $data->id) selected @endif>{{$data->name}} - {{$data->departement}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
