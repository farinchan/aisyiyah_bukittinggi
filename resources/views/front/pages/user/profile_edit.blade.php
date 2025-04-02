@extends('front.app')

@section('seo')
    <title>Home</title>
    <meta name="description" content="Home">
    <meta name="keywords" content="Home">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
      h5 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.25rem;
            margin-top: 30px;
            background-color: #fff;
            transition: transform 0.2s;

        }

        p {
            font-size: 1rem;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 1.25rem 0.75rem;
        }


        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }

        table{

            padding: 0.5rem;
            margin: 0.5rem;
        }
        .card-title{
            font-size: 2rem;
            padding: 0.5rem;

        }
        .card-footer {
            padding: 1.25rem 0.75rem;
            background-color: #ffffff;
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
    <main class="my-5">
        <div class="container">

            <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
                <div class="col-md-4">
                    @include('front.pages.user.__sidebar')
                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title">Profile</h5>
                        </div>
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Foto') }}
                                        </label>
                                        <div class="col-md-8">
                                            <image class="shadow-sm"
                                                src="@if (auth()->user()->photo) {{ Storage::url(auth()->user()->photo) }}@else{{ asset('front/img/image_placeholder.jpg') }} @endif"
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
                                        <label for="name"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Nama Lengkap') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <input type="text" placeholder="Nama Lengkap"
                                                   required=""
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ $user->name }}" autocomplete="name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Jenis Kelamin') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <select name="gender" id="gender"
                                                    class="form-control form-select required">
                                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        @if ($user->gender == 'Laki-laki') selected @endif>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        @if ($user->gender == 'Perempuan') selected @endif> Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-md-3 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir') }}

                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group-icon">
                                                <input type="text" placeholder="Tempat Lahir"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Tempat Lahir'" required=""
                                                    class="form-control @error('place_of_birth') is-invalid @enderror"
                                                    name="place_of_birth" value="{{ $user->place_of_birth }}"
                                                    autocomplete="place_of_birth">
                                            </div>
                                            @error('place_of_birth')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group-icon">
                                                <input type="date" placeholder="Tanggal Lahir"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Tanggal Lahir'" required=""
                                                    class="form-control @error('birth_date') is-invalid @enderror"
                                                    name="birth_date" value="{{ Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') }}"
                                                    autocomplete="birth_date">
                                            </div>
                                            @error('birth_date')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No. HP"
                                            class="col-md-3 col-form-label text-md-right">{{ __('No. HP') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <input type="text" placeholder="No. HP"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'No. HP'"
                                                    required=""
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ $user->phone }}" autocomplete="phone">
                                            </div>
                                            @error('phone')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Alamat"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Alamat') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <textarea type="text" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
                                                    required="" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address"
                                                    rows="3">{{ $user->address }}</textarea>
                                            </div>
                                            @error('address')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Pekerjaan"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Pekerjaan') }}

                                        </label>
                                        @php
                                        $job = json_decode($user->job??'[]');
                                        @endphp
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <select id="job" class="select2 form-select" name="job[]"
                                                    multiple="multiple" required>
                                                    <option
                                                        value="Ustadz"@if (in_array('Ustadz', $job)) selected @endif>
                                                        Ustadz</option>
                                                    <option
                                                        value="Dosen"@if (in_array('Dosen', $job)) selected @endif>
                                                        Dosen</option>
                                                    <option
                                                        value="Guru"@if (in_array('Guru', $job)) selected @endif>
                                                        Guru</option>
                                                    <option
                                                        value="Arsitek"@if (in_array('Arsitek', $job)) selected @endif>
                                                        Arsitek</option>
                                                    <option
                                                        value="Nelayan"@if (in_array('Nelayan', $job)) selected @endif>
                                                        Nelayan</option>
                                                    <option
                                                        value="Perawat"@if (in_array('Perawat', $job)) selected @endif>
                                                        Perawat</option>
                                                    <option
                                                        value="Dokter"@if (in_array('Dokter', $job)) selected @endif>
                                                        Dokter</option>
                                                    <option
                                                        value="Bidan"@if (in_array('Bidan', $job)) selected @endif>
                                                        Bidan</option>
                                                    <option
                                                        value="Pemadam Kebakaran"@if (in_array('Pemadam Kebakaran', $job)) selected @endif>
                                                        Pemadam Kebakaran</option>
                                                    <option
                                                        value="Kondektur"@if (in_array('Kondektur', $job)) selected @endif>
                                                        Kondektur</option>
                                                    <option
                                                        value="Pilot"@if (in_array('Pilot', $job)) selected @endif>
                                                        Pilot</option>
                                                    <option
                                                        value="Masinis"@if (in_array('Masinis', $job)) selected @endif>
                                                        Masinis</option>
                                                    <option
                                                        value="Wartawan"@if (in_array('Wartawan', $job)) selected @endif>
                                                        Wartawan</option>
                                                    <option
                                                        value="Penulis"@if (in_array('Penulis', $job)) selected @endif>
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
                                                    <option
                                                        value="Hakim"@if (in_array('Hakim', $job)) selected @endif>
                                                        Hakim</option>
                                                    <option
                                                        value="Notaris"@if (in_array('Notaris', $job)) selected @endif>
                                                        Notaris</option>
                                                    <option
                                                        value="Teller Bank"@if (in_array('Teller Bank', $job)) selected @endif>
                                                        Teller Bank</option>
                                                    <option
                                                        value="Koki"@if (in_array('Koki', $job)) selected @endif>
                                                        Koki</option>
                                                    <option
                                                        value="Artis"@if (in_array('Artis', $job)) selected @endif>
                                                        Artis</option>
                                                    <option
                                                        value="Penerjemah"@if (in_array('Penerjemah', $job)) selected @endif>
                                                        Penerjemah</option>
                                                    <option
                                                        value="Tentara"@if (in_array('Tentara', $job)) selected @endif>
                                                        Tentara</option>
                                                    <option
                                                        value="Tukang Cukur"@if (in_array('Tukang Cukur', $job)) selected @endif>
                                                        Tukang Cukur</option>
                                                    <option
                                                        value="Petani"@if (in_array('Petani', $job)) selected @endif>
                                                        Petani</option>
                                                    <option
                                                        value="Akuntan"@if (in_array('Akuntan', $job)) selected @endif>
                                                        Akuntan</option>
                                                    <option
                                                        value="Pengacara"@if (in_array('Pengacara', $job)) selected @endif>
                                                        Pengacara</option>
                                                    <option
                                                        value="Polisi"@if (in_array('Polisi', $job)) selected @endif>
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
                                                    <option
                                                        value="Lainnya"@if (in_array('Lainnya', $job)) selected @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                            @error('job')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="kepakaran"></div>

                                    <div class="form-group row">
                                        <label for="Keanggotaan"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Keanggotaan') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <select name="keanggotaan" id="keanggotaan"
                                                    class="form-control form-select @error('keanggotaan') is-invalid @enderror"
                                                    required>
                                                    <option value="" disabled selected>Pilih Keanggotaan</option>
                                                    <option value="Kader Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Kader Muhammadiyah') selected @endif>
                                                        Kader Muhammadiyah</option>
                                                    <option value="Warga Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Warga Muhammadiyah') selected @endif>
                                                        Warga Muhammadiyah</option>
                                                    <option value="Simpatisan Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Simpatisan Muhammadiyah') selected @endif>
                                                        Simpatisan Muhammadiyah</option>
                                                </select>
                                            </div>
                                            @error('keanggotaan')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <input type="text" placeholder="Email" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Email'" required=""
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{$user->email }}" autocomplete="email">
                                            </div>
                                            @error('email')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Password') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <input type="password" placeholder="Password"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="current-password">
                                            </div>
                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                                            @error('password')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('user.kajian') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
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
        $('#job').select2({
            placeholder: "Pilih Pekerjaan",
            // theme: 'bootstrap4'
        });

        $('#job').on('change', function() {
            var data = $(this).val();
            if (data.includes('Ustadz')) {
                $('#kepakaran').html(`
                    <div class="form-group row">
                        <label for="Kepakaran" class="col-md-3 col-form-label text-success text-md-right">{{ __('Kepakaran') }}

                        </label>
                        <div class="col-md-8">
                            <div class="input-group-icon">
                                <div class="icon"><i class="fa-regular fa-brain-circuit"></i></div>
                                <select name="kepakaran" id="kepakaran"
                                    class="form-select form-control @error('kepakaran') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Kepakaran</option>
                                    <option value="Tafsir">Tafsir</option>
                                    <option value="Hadist">Hadist</option>
                                    <option value="Fiqih">Fiqih</option>
                                    <option value="Aqidah">Aqidah</option>
                                    <option value="Tarikh">Tarikh</option>
                                </select>
                            </div>
                            @error('kepakaran')
                                <span class="text-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                `);
            } else {
                $('#kepakaran').html('');
            }
        });
    </script>
@endsection
