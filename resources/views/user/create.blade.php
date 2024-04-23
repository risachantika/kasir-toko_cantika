@extends('layouts.main',['title'=>'User'])
@section('title-content')
<i class="fas fa-user-tie mr-2"></i>
User
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-6">
        <form method="POST" action="{{route('user.store')}}" class="card card-orange card-outline">
            <div class="card-header">
                <h3 class="card-title">Buat User Baru</h3>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <x-input name="nama" type="text"/>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <x-input name="username" type="text"/>
                </div>
                <div class="form-group">
                    <label>Role/Peran</label>
                    <x-select name="role"
                    :options="[['','Pilih:'],['petugas','petugas'],['admin','Administrator']]"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" id="toggle-password" onclick="togglePasswordVisibility('password')"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <div class="input-group">
                        <input id="confirm-password" name="password_confirmation" type="password" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" id="toggle-confirm-password" onclick="togglePasswordVisibility('confirm-password')"></i>
                            </span>
                        </div>
                    </div>
                </div>            
            <script>
                function togglePasswordVisibility(inputId) {
                    var inputElement = document.getElementById(inputId);
                    var toggleIcon = document.getElementById("toggle-" + inputId);
            
                    // Periksa apakah password sedang ditampilkan atau disembunyikan
                    if (inputElement.type === "password") {
                        inputElement.type = "text";
                        toggleIcon.classList.remove("fa-eye-slash");
                        toggleIcon.classList.add("fa-eye");
                    } else {
                        inputElement.type = "password";
                        toggleIcon.classList.remove("fa-eye");
                        toggleIcon.classList.add("fa-eye-slash");
                    }
                }
            </script>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Simpan User
                    </button>
                    <a href="{{route('user.index')}}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection