@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <style>
        .login-area {
            background: #f9f9f9;
            padding: 50px 0;
        }

        .login-form {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-form .form-group label {
            font-weight: bold;
        }

        .login-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .login-form .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .login-form .form-group p {
            margin-top: 15px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .col-form-label {
            font-size: 14px;
            font-weight: 600;
            text-align: right;
            padding-top: 10px;
            padding-right: 10px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            height: 45px;
        }
    </style>
@endsection

@section('content')
    @include('front.partials.breadcrumb')

    <!-- Start Login -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="login-form">
                        <h3 class="text-center mb-4">Masuk Ke Akun kamu</h3>
                        <p class="text-center mb-4" style="padding: 0 20px;">
                            Silahkan masukkan email dan password yang terdaftar untuk masuk ke akun kamu. Jika belum
                            memiliki akun, silahkan daftar terlebih dahulu.
                        </p>
                        <form action="{{ route('login.process') }}" method="POST" style="margin-top: 40px;">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger ">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter your password" required>
                                    @error('password')
                                        <small class="text-danger ">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button class="btn btn-theme border btn-md" href="#">Masuk</button>
                                    <p>
                                        Belum terdaftar sebagai anggota aisyiyah? <a href="{{ route('register') }}">Daftar
                                            disini</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
@endsection
