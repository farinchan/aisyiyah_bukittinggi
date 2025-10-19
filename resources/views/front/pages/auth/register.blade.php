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

        .form-select {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            height: 45px;
            width: 100%;
        }

        .select2-container--default .select2-selection--multiple {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            /* height: 45px; */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    @include('front.partials.breadcrumb')
    <!-- Start Login -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if ($setting_web->register_page)
                        <div class="login-form">
                            <h3 class="text-center mb-4">Daftar Akun</h3>
                            <p class="text-center mb-4" style="padding: 0 20px;">
                                Silahkan isi data diri anda dengan lengkap dan benar. Pastikan anda mengisi semua kolom yang
                                bertanda bintang (*). <br> Jika anda sudah memiliki akun, silahkan login <a
                                    href="{{ route('login') }}">disini</a>.
                            </p>
                            <form action="{{ route('register.process') }}" method="POST" style="margin-top: 40px;"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                                    <div class="col-sm-9">
                                        <image class="shadow-sm" src="{{ asset('front/img/image_placeholder.jpg') }}"
                                            height="150px" alt="" id="photo_preview" style="cursor: pointer">
                                            <input type="file" accept="image/*" class="form-control" name="photo"
                                                id="photo" style="display: none"><br>
                                            <small class="text-muted">Klik pada gambar untuk mengganti foto</small>
                                            @error('photo')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Nama *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Kamu" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 col-form-label">Jenis Kelamin *</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="place_of_birth" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir
                                        *</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth"
                                            placeholder="Tempat Lahir" value="{{ old('place_of_birth') }}" required>
                                        @error('place_of_birth')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ old('birth_date') }}" required>
                                        @error('birth_date')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">No. Telp *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Masukkan No Telp" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Alamat *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="address" name="address" placeholder="Masukkan Alamat" required>{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-sm-3 col-form-label">Provinsi *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="province" name="province"
                                            placeholder="Provinsi" value="{{ old('province') }}" required>
                                        @error('province')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 col-form-label">Kabupaten/Kota *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" name="city"
                                            placeholder="Kabupaten/Kota" value="{{ old('city') }}" required>
                                        @error('city')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district" class="col-sm-3 col-form-label">Kecamatan *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="district" name="district"
                                            placeholder="Kecamatan" value="{{ old('district') }}" required>
                                        @error('district')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="village" class="col-sm-3 col-form-label">Kenagarian/Kelurahan *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="village" name="village"
                                            placeholder="Kenagarian/Kelurahan" value="{{ old('village') }}" required>
                                        @error('village')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keanggotaan" class="col-sm-3 col-form-label">Keanggotaan *</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="keanggotaan" name="keanggotaan" required>

                                            <option value="Kader Aisyiyah"
                                                {{ old('keanggotaan') == 'Kader Aisyiyah' ? 'selected' : '' }}>Kader
                                                Aisyiyah
                                            </option>
                                            <option value="Warga Aisyiyah"
                                                {{ old('keanggotaan') == 'Warga Aisyiyah' ? 'selected' : '' }}>Warga
                                                Aisyiyah
                                            </option>
                                            <option value="Simpatisan Aisyiyah"
                                                {{ old('keanggotaan') == 'Simpatisan Aisyiyah' ? 'selected' : '' }}>
                                                Simpatisan
                                                Aisyiyah</option>
                                        </select>
                                        @error('keanggotaan')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="job" class="col-sm-3 col-form-label">Pekerjaan *</label>
                                    <div class="col-sm-9">

                                        @php
                                            $job = json_decode(old('job', '[]'), true);
                                        @endphp
                                        <div class="input-group-icon">
                                            <select id="job" class="select2 form-select" name="job[]"
                                                multiple="multiple" required>
                                                <option value="Ustadz"@if (in_array('Ustadz', $job)) selected @endif>
                                                    Ustadz</option>
                                                <option value="Dosen"@if (in_array('Dosen', $job)) selected @endif>
                                                    Dosen</option>
                                                <option value="Guru"@if (in_array('Guru', $job)) selected @endif>
                                                    Guru</option>
                                                <option value="Arsitek"@if (in_array('Arsitek', $job)) selected @endif>
                                                    Arsitek</option>
                                                <option value="Nelayan"@if (in_array('Nelayan', $job)) selected @endif>
                                                    Nelayan</option>
                                                <option value="Perawat"@if (in_array('Perawat', $job)) selected @endif>
                                                    Perawat</option>
                                                <option value="Dokter"@if (in_array('Dokter', $job)) selected @endif>
                                                    Dokter</option>
                                                <option value="Bidan"@if (in_array('Bidan', $job)) selected @endif>
                                                    Bidan</option>
                                                <option
                                                    value="Pemadam Kebakaran"@if (in_array('Pemadam Kebakaran', $job)) selected @endif>
                                                    Pemadam Kebakaran</option>
                                                <option
                                                    value="Kondektur"@if (in_array('Kondektur', $job)) selected @endif>
                                                    Kondektur</option>
                                                <option value="Pilot"@if (in_array('Pilot', $job)) selected @endif>
                                                    Pilot</option>
                                                <option value="Masinis"@if (in_array('Masinis', $job)) selected @endif>
                                                    Masinis</option>
                                                <option
                                                    value="Wartawan"@if (in_array('Wartawan', $job)) selected @endif>
                                                    Wartawan</option>
                                                <option value="Penulis"@if (in_array('Penulis', $job)) selected @endif>
                                                    Penulis</option>
                                                <option
                                                    value="Insinyur Mesin"@if (in_array('Insinyur Mesin', $job)) selected @endif>
                                                    Insinyur Mesin</option>
                                                <option
                                                    value="Ahli Gizi"@if (in_array('Ahli Gizi', $job)) selected @endif>
                                                    Ahli Gizi</option>
                                                <option
                                                    value="Pustakawan"@if (in_array('Pustakawan', $job)) selected @endif>
                                                    Pustakawan</option>
                                                <option value="Hakim"@if (in_array('Hakim', $job)) selected @endif>
                                                    Hakim</option>
                                                <option value="Notaris"@if (in_array('Notaris', $job)) selected @endif>
                                                    Notaris</option>
                                                <option
                                                    value="Teller Bank"@if (in_array('Teller Bank', $job)) selected @endif>
                                                    Teller Bank</option>
                                                <option value="Koki"@if (in_array('Koki', $job)) selected @endif>
                                                    Koki</option>
                                                <option value="Artis"@if (in_array('Artis', $job)) selected @endif>
                                                    Artis</option>
                                                <option
                                                    value="Penerjemah"@if (in_array('Penerjemah', $job)) selected @endif>
                                                    Penerjemah</option>
                                                <option value="Tentara"@if (in_array('Tentara', $job)) selected @endif>
                                                    Tentara</option>
                                                <option
                                                    value="Tukang Cukur"@if (in_array('Tukang Cukur', $job)) selected @endif>
                                                    Tukang Cukur</option>
                                                <option value="Petani"@if (in_array('Petani', $job)) selected @endif>
                                                    Petani</option>
                                                <option value="Akuntan"@if (in_array('Akuntan', $job)) selected @endif>
                                                    Akuntan</option>
                                                <option
                                                    value="Pengacara"@if (in_array('Pengacara', $job)) selected @endif>
                                                    Pengacara</option>
                                                <option value="Polisi"@if (in_array('Polisi', $job)) selected @endif>
                                                    Polisi</option>
                                                <option
                                                    value="Pegawai Negeri"@if (in_array('Pegawai Negeri', $job)) selected @endif>
                                                    Pegawai Negeri</option>
                                                <option
                                                    value="Pegawai Swasta"@if (in_array('Pegawai Swasta', $job)) selected @endif>
                                                    Pegawai Swasta</option>
                                                <option
                                                    value="Wiraswasta"@if (in_array('Wiraswasta', $job)) selected @endif>
                                                    Wiraswasta</option>
                                                <option value="Lainnya"@if (in_array('Lainnya', $job)) selected @endif>
                                                    Lainnya</option>
                                            </select>
                                        </div>
                                        @error('job')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row" id="kepakaran">
                                    <label for="kepakaran" class="col-sm-3 col-form-label">Kepakaran</label>
                                    <div class="col-sm-9">
                                        <select name="kepakaran" id="kepakaran"
                                            class="form-select form-control @error('kepakaran') is-invalid @enderror"
                                            required>
                                            <option value="" disabled selected>Pilih Kepakaran</option>
                                            <option value="Tafsir" {{ old('kepakaran') == 'Tafsir' ? 'selected' : '' }}>
                                                Tafsir</option>
                                            <option value="Hadist" {{ old('kepakaran') == 'Hadist' ? 'selected' : '' }}>
                                                Hadist</option>
                                            <option value="Fiqih" {{ old('kepakaran') == 'Fiqih' ? 'selected' : '' }}>
                                                Fiqih</option>
                                            <option value="Aqidah" {{ old('kepakaran') == 'Aqidah' ? 'selected' : '' }}>
                                                Aqidah</option>
                                            <option value="Tarikh" {{ old('kepakaran') == 'Tarikh' ? 'selected' : '' }}>
                                                Tarikh</option>
                                        </select>
                                        @error('kepakaran')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="ktam" class="col-sm-3 col-form-label">KTAM *</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="ktam" name="ktam" required>
                                            <option value="Ada" {{ old('ktam') == 'Ada' ? 'selected' : '' }}>Ada
                                            </option>
                                            <option value="Tidak Ada" {{ old('ktam') == 'Tidak Ada' ? 'selected' : '' }}>
                                                Tidak Ada</option>
                                        </select>
                                        @error('ktam')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nbm" class="col-sm-3 col-form-label">NBM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nbm" name="nbm"
                                            placeholder="Masukkan NBM" value="{{ old('nbm') }}">
                                        @error('nbm')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email *</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" value="{{ old('email') }}" required>
                                        <small class="text-muted">Pastikan email yang anda masukkan adalah email yang
                                            aktif, karena kami akan mengirimkan informasi ke email tersebut.</small>
                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password *</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" required>
                                        <small class="text-muted">Minimal 8 karakter, kombinasi huruf besar, huruf kecil,
                                            angka dan simbol</small>
                                        @error('password')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-theme border btn-md">Register</button>
                                        <p>
                                            Sudah Memiliki Akun? <a href="{{ route('login') }}">Login disini</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="login-form">
                            <h3 class="text-center mb-4">Pendaftaran Ditutup</h3>
                            <p class="text-center mb-4" style="padding: 0 20px;">
                                {{ $setting_web->register_page_content }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#photo_preview').click(function() {
            $('#photo').click();
        });

        $('#photo').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#kepakaran').hide();
        });
        $('#job').select2({
            placeholder: "Pilih Pekerjaan",
            // theme: 'bootstrap4'
        });

        $('#kepakaran_select2').select2({
            placeholder: "Pilih Kepakaran",
            // theme: 'bootstrap4'
        });

        $('#job').on('change', function() {
            var data = $(this).val();
            if (data.includes('Ustadz')) {
                $('#kepakaran').show();
            } else {
                $('#kepakaran').hide();
            }
        });
    </script>
@endsection
