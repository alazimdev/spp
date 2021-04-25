@extends('layouts.app')

@section('subtitle', 'Edit Data SPP')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Edit Data SPP
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <form action="{{ route('spp-update', $spp->id) }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                    <!-- Basic Elements -->
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="period">Periode</label>
                                    <input type="text" class="form-control" id="period" name="period" placeholder="Periode"
                                        required value="{{$spp->period}}">
                                    <p>Contoh: 2018/2019 atau 2019</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_start">Bulan Mulai Bayar</label>
                                    <select name="month_start" id="month_start" class="form-control" {{$pay}}>
                                        <option value="01" @if($spp->month_start == '01') selected @endif>Januari</option>
                                        <option value="02" @if($spp->month_start == '02') selected @endif>Februari</option>
                                        <option value="03" @if($spp->month_start == '03') selected @endif>Maret</option>
                                        <option value="04" @if($spp->month_start == '04') selected @endif>April</option>
                                        <option value="05" @if($spp->month_start == '05') selected @endif>Mei</option>
                                        <option value="06" @if($spp->month_start == '06') selected @endif>Juni</option>
                                        <option value="07" @if($spp->month_start == '07') selected @endif>Juli</option>
                                        <option value="08" @if($spp->month_start == '08') selected @endif>Agustus</option>
                                        <option value="09" @if($spp->month_start == '09') selected @endif>September</option>
                                        <option value="10" @if($spp->month_start == '10') selected @endif>Oktober</option>
                                        <option value="11" @if($spp->month_start == '11') selected @endif>November</option>
                                        <option value="12" @if($spp->month_start == '12') selected @endif>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_start">Tahun Mulai Bayar</label>
                                    <input type="number" class="form-control" id="year_start" name="year_start"
                                        placeholder="Tahun Mulai Bayar"min="0" max="9999" required value="{{$spp->year_start}}" {{$pay}}>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="month_end">Bulan Terakhir Bayar</label>
                                    <select name="month_end" id="month_end" class="form-control" {{$pay}}>
                                        <option value="01" @if($spp->month_end == '01') selected @endif>Januari</option>
                                        <option value="02" @if($spp->month_end == '02') selected @endif>Februari</option>
                                        <option value="03" @if($spp->month_end == '03') selected @endif>Maret</option>
                                        <option value="04" @if($spp->month_end == '04') selected @endif>April</option>
                                        <option value="05" @if($spp->month_end == '05') selected @endif>Mei</option>
                                        <option value="06" @if($spp->month_end == '06') selected @endif>Juni</option>
                                        <option value="07" @if($spp->month_end == '07') selected @endif>Juli</option>
                                        <option value="08" @if($spp->month_end == '08') selected @endif>Agustus</option>
                                        <option value="09" @if($spp->month_end == '09') selected @endif>September</option>
                                        <option value="10" @if($spp->month_end == '10') selected @endif>Oktober</option>
                                        <option value="11" @if($spp->month_end == '11') selected @endif>November</option>
                                        <option value="12" @if($spp->month_end == '12') selected @endif>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="year_end">Tahun Terakhir Bayar</label>
                                    <input type="number" class="form-control" id="year_end" name="year_end"
                                        placeholder="Tahun Terakhir Bayar"min="0" max="9999" required value="{{$spp->year_end}}" {{$pay}}>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <p>*Note: Untuk pembuatan data SPP, bulan dan tahun mulai dan berakhir tidak boleh bentrok dengan data lain. Jadi, tolong perhatikan data dengan baik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="nominal">Nominal Bayar Perbulan</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Nominal Bayar Perbulan"
                                        min="1" required value="{{$spp->nominal}}" {{$pay}}>
                                </div>
                            </div>
                        </div>
                    <!-- END Basic Elements -->
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
