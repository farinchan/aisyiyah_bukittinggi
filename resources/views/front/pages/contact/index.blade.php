@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('contact') }}">
    <link rel="canonical" href="{{ route('contact') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <style>
        #map {
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    @include('front.partials.breadcrumb')

    <!-- Start Google Maps
            ============================================= -->
    <div class="maps-area">
        <div class="container-full">
            <div class="row">
                <div class="google-maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14217.899744230352!2d100.38151331598215!3d-0.3014266340436995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd5389cf1e72cab%3A0xbb5d0a65083a1cbb!2sPanti%20Asuhan%20Aisyiah%20Putra!5e0!3m2!1sid!2sid!4v1725587482668!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google Maps -->

    <!-- Start Contact List
            ============================================= -->
    <div class="contact-list-area text-center">
        <div class="container">
            <div class="row">
                <!-- Start Contact Info -->
                <div class="contact-info">
                    <div class="col-md-4 col-sm-4 single">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Telephone</h4>
                                <span>{{ $setting_web->phone }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 single">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info">
                                <h4>Alamat</h4>
                                <span>{{ $setting_web->address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 single">
                        <div class="item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4>Email</h4>
                                <span>{{ $setting_web->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Info -->
            </div>
        </div>
    </div>
    <!-- End Contact List -->

    <!-- Start Contact
            ============================================= -->
    <div class="contact-area bg-gray default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-5 contact-form">
                    <div class="info">
                        <h2>Hubungi Kami</h2>
                        <p>
                            Anda dapat menghubungi kami untuk memberikan pertanyaan, saran, kritik, atau masukan melaui form
                            di bawah ini dengan senang hati. Kami akan segera merespon pesan Anda secepatnya.
                        </p>
                        <form action="{{ route('message') }}" method="POST" id="contact_form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" placeholder="Nama *" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" placeholder="Email *" type="email"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" placeholder="Subjek *" type="text"
                                            required>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" name="message" placeholder="Masukkan Pesan Anda*" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" name="send"
                                    onclick="event.preventDefault(); document.getElementById('contact_form').submit();">
                                        Kirim Pesan <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->
@endsection

@section('scripts')
@endsection
