@extends('layouts.main',['title'=>'User'])
@section('title-content')
    <i class="fas fa-user-tie mr-2"></i> User
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('user.update',[
                'user'=>$user->id
            ]) }}" class="card card-orange card-outline">
                <div class="card-header">
                    <h3 class="card-title">Ubah User</h3>
                </div>
                
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <x-input name="nama" type="text" :value="$user->nama" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <x-input name="username" type="text" :value="$user->username" />
                    </div>
                    <div class="form-group">
                        <label>Role/ Peran</label>
                        <x-select name="role" :value="$user->role" :options="[['', 'Pilih:'], ['petugas', 'Petugas'], ['admin', 'Administrator']]"  />
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <div class="input-group">
                            <input type="password" id="password_baru" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="password-toggle" onclick="togglePasswordVisibility('password_baru')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('password_baru')
                            <div class="d-block invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password Konfirmasi</label>
                        <div class="input-group">
                            <input type="password" id="password_baru_confirmation" name="password_baru_confirmation" class="form-control @error('password_baru_confirmation') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="password-toggle" onclick="togglePasswordVisibility('password_baru_confirmation')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @error('password_baru_confirmation')
                            <div class="d-block invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <script>
                    function togglePasswordVisibility(passwordInputId) {
                        var passwordInput = document.getElementById(passwordInputId);
                        if (passwordInput.type === "password") {
                            passwordInput.type = "text";
                            document.querySelector(".password-toggle i").classList.remove("fa-eye");
                            document.querySelector(".password-toggle i").classList.add("fa-eye-slash");
                        } else {
                            passwordInput.type = "password";
                            document.querySelector(".password-toggle i").classList.remove("fa-eye-slash");
                            document.querySelector(".password-toggle i").classList.add("fa-eye");
                        }
                    }
                    </script>
                </div>
                
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Update User
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection