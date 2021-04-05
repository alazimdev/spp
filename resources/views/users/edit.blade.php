@extends('layouts.app')

@section('subtitle', 'Edit Pengguna')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
            <div
                class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                <div>
                    <h1 class="h2 mb-1">
                        Edit Pengguna
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <form action="{{ route('pengguna-update', $user->id) }}" method="POST" onsubmit="return true;">
                @csrf
                <div class="modal-body pb-1">

                    <!-- Basic Elements -->
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                                    value="{{$user->name}}" required>
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
                                value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="is_superuser">Jenis</label>
                                <select class="form-control" id="is_superuser" name="is_superuser" disabled>
                                    <option value="0" @if($user->is_superuser == false) selected @endif>Petugas</option>
                                    <option value="1" @if($user->is_superuser == true) selected @endif>Admin</option>
                                </select>
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
