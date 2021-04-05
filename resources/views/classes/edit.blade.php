@extends('layouts.app')

@section('subtitle', 'Edit Kelas')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Edit Kelas
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <form action="{{ route('kelas-update', $classes->id) }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="name">Nama Kelas</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kelas"
                                    value="{{$classes->name}}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="departement">Nama Jurusan</label>
                                <input type="text" class="form-control" id="departement" name="departement"
                                    placeholder="Nama Jurusan" value="{{$classes->departement}}" required>
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
