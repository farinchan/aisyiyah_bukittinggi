@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('keanggotaan') }}">
    <link rel="canonical" href="{{ route('keanggotaan') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <style>
        .login-area {
            /* padding: 50px 0; */
        }

        /* .login-form {
                    background: #ffffff;
                    padding: 40px;
                    border-radius: 20px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                } */

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
            font-size: 18px;
            font-weight: 600;
            /* text-align: right; */
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

        .form-select {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            height: 45px;
            width: 100%;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus-visible {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus-visible {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
@endsection

@section('content')
    @include('front.partials.breadcrumb')

    <!-- Start Login -->
    <div class="login-area " style="padding-top: 50px; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="login-form">
                        <h3 class=" mb-4">List Keanggotaan</h3>
                        <p class=" mb-4">

                            Silahkan cari anggota yang ingin anda lihat, dengan memasukkan nama atau keanggotaan
                            dari anggota tersebut.
                        </p>
                        <form  style="margin-top: 40px;">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama anggota"
                                        value="{{ request('nama') }}">
                                    @error('nama')
                                        <small class="text-danger ">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keanggotaan" class="col-sm-2 col-form-label">Keanggotaan</label>
                                <div class="col-sm-10">
                                    <select name="keanggotaan" class="form-select" aria-label="Default select example">
                                        <option>Semua</option>
                                        <option value="Kader Muhammadiyah"
                                            @if (request('keanggotaan') == 'Kader Muhammadiyah') selected @endif>Kader
                                            Muhammadiyah</option>
                                        <option value="Warga Muhammadiyah"
                                            @if (request('keanggotaan') == 'Warga Muhammadiyah') selected @endif>Warga
                                            Muhammadiyah</option>
                                        <option value="Simpatisan Muhammadiyah"
                                            @if (request('keanggotaan') == 'Simpatisan Muhammadiyah') selected @endif>Simpatisan
                                            Muhammadiyah</option>
                                    </select>
                                    @error('keanggotaan')
                                        <small class="text-danger ">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-theme border btn-md" href="#">Cari</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

    <!-- Start Team
                    ============================================= -->
    <div class="team-area default-padding bottom-less">
        <div class="container">


            <div class="row">
                <div class="team-items text-center">
                    <!-- Single Item -->
                    @forelse ($users as $user)
                        <div class="col-md-4 single-item">
                            <div class="item">
                                <a href="{{ route('keanggotaan.detail', $user->id) }}">
                                    <div class="thumb">
                                        <div class="top-img">
                                            <img src="{{ $user->getPhoto() }}" alt="Thumb"
                                                style="width: 100%; height: 300px; object-fit: cover;">
                                        </div>
                                        {{-- <div class="overlay">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('keanggotaan.detail', $user->id) }}"><i
                                                            class="fa fa-user"></i></a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="info">
                                        <div class="overlay">
                                            <a href="{{ route('keanggotaan.detail', $user->id) }}">
                                                <h4>{{ $user->name }}</h4>
                                            </a>
                                        </div>
                                        <span>{{ $user->keanggotaan }}</span>
                                        {{-- <p>
                                        Advice branch vanity or do thirty living. Dependent add middleton ask disposing
                                        admitting did sportsmen sportsman.
                                    </p> --}}
                                    </div>
                                </a>

                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center" style="border-radius: 10px;">
                                <strong>Data tidak ditemukan</strong>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-md-12 pagi-area">
                    <nav aria-label="navigation">
                        <ul class="pagination">
                            @if ($users->onFirstPage())
                                <li>
                                    <a href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                            @else
                                <li>
                                    <a
                                        href="{{ route('keanggotaan', ['page' => $users->currentPage() - 1, 'q' => request()->q]) }}"><i
                                            class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                            @endif

                            @php
                                // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                $start = max($users->currentPage() - 2, 1);
                                $end = min($start + 4, $users->lastPage());
                            @endphp

                            @if ($start > 1)
                                <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                <li><a href="#">...</a></li>
                            @endif

                            @foreach ($users->getUrlRange($start, $end) as $page => $url)
                                @if ($page == $users->currentPage())
                                    <li class="active"><a href="#">{{ $page }}</a></li>
                                @else
                                    <li><a
                                            href="{{ route('keanggotaan', ['page' => $page, 'q' => request()->q]) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            @if ($end < $users->lastPage())
                                <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                <li><a href="#">...</a></li>
                            @endif

                            @if ($users->hasMorePages())
                                <li><a
                                        href="{{ route('keanggotaan', ['page' => $users->currentPage() + 1, 'q' => request()->q]) }}"><i
                                            class="fas fa-long-arrow-alt-right"></i></a></li>
                            @else
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Team -->
@endsection
