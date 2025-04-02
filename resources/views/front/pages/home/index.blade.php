@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('content')
    <!-- Start Banner
                                        ============================================= -->
    <div class="banner-area auto-height title-uppercase small-first text-light text-center">
        <div id="bootcarousel" class="carousel inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner carousel-zoom">

                @foreach ($banner_list as $banner)
                    <div class="item @if ($loop->first) active @endif">
                        <div class="slider-thumb bg-cover" style="background-image: url('{{ $banner->getImage() }}');">
                        </div>
                        <div class="box-table">
                            <div class="box-cell shadow dark">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="content">
                                                <h1 data-animation="animated slideInLeft">{{ $banner->title }}</h1>
                                                <h3 data-animation="animated slideInDown">{{ $banner->subtitle }} </h3>
                                                <a data-animation="animated slideInUp" class="btn btn-light border btn-md"
                                                    href="{{ $banner->url }}">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Banner -->



    <!-- Start Blog Area
                    ============================================= -->
    <div class="blog-area default-padding bottom-less" style="padding-bottom: 0px;">"
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Berita Terbaru</h2>
                        <span class="devider"></span>
                        <p>
                            Berita terbaru dari Aisyiyah Bukittinggi. <br>
                            Berita ini berisi tentang kegiatan, acara, dan informasi terbaru dari Aisyiyah Bukittinggi.
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            @php
                $firstNews = $news->first();
                $remainingNews = $news->slice(1);
            @endphp
            <div class="row">
                <div class="blog-items">
                    <!-- Single Item -->
                    <div class="col-md-5 single-item">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{ route('news.detail', $firstNews->slug) }}"><img
                                        src="{{ $firstNews->getThumbnail() }}" alt="Thumb"></a>
                            </div>
                            <div class="info">
                                <div class="date">
                                    <h4>{{ $firstNews->created_at->format('d M Y') }}</h4>
                                </div>
                                <h4>
                                    <a href="{{ route('news.detail', $firstNews->slug) }}">{{ $firstNews->title }}</a>
                                </h4>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i>
                                                {{ $firstNews?->user?->name }}</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-comments"></i>
                                                {{ $firstNews->comments->count() }} </a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-tag"></i>
                                                {{ $firstNews->category->name }} </a>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    {{ Str::limit(strip_tags($firstNews->content), 300) }}
                                </p>
                                <a class="btn btn-theme border btn-md"
                                    href="{{ route('news.detail', $firstNews->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">

                            @foreach ($remainingNews as $news)
                                <div class="col-md-6 single-item">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="#"><img src="{{ $news->getThumbnail() }}" alt="Thumb"></a>
                                        </div>
                                        <div class="info">
                                            <div class="date">
                                                <h4>{{ $news->created_at->format('d M Y') }}</h4>
                                            </div>
                                            <h4 style="font-size: 16px;">
                                                <a href="{{ route('news.detail', $news->slug) }}">{{ $news->title }}</a>
                                            </h4>
                                            <div class="meta">
                                                <ul>
                                                    <li>
                                                        <a href="#"><i class="fas fa-user"></i>
                                                            {{ $news?->user?->name }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fas fa-comments"></i>
                                                            {{ $news->comments->count() }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fas fa-tag"></i>
                                                            {{ $news->category->name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->

    <!-- Start pengumuman Area
                    ============================================= -->
    <div class="blog-area default-padding bottom-less bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Pengumuman</h2>
                        <span class="devider"></span>

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($pengumumans as $pengumuman)
                    <div class="col-md-4">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="thumb">
                                    <img src="{{ $pengumuman->image ? Storage::url($pengumuman->image) : 'https://file.iainpare.ac.id/wp-content/uploads/2019/07/pengumuman.png' }}"
                                        alt="Thumb" style="height: 100px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <small>
                                    {{ $pengumuman->created_at->format('d M Y') }}
                                </small>
                                <h4 style="font-size: 16px;">
                                    <a href="{{ route('pengumuman.detail', $pengumuman->slug) }}">
                                        {{ Str::limit($pengumuman->title, 50) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End pengumuman Area -->



    <!-- Start About
                                        ============================================= -->
    <div class="about-area default-padding ">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="{{ $welcome_speech?->getImage() ?? '-' }}" alt="Thumb">
                </div>
                <div class="col-md-7 tabs-items">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="info title">
                            <h4>Kata Sambutan Ketua Aisyiyah Bukittinggi</h4>
                            <h2>
                                {{ $welcome_speech?->name ?? '-' }}
                            </h2>
                            <p>
                                Assalamu’alaikum Warahmatullahi Wabarakatuh,
                            </p>
                            <p>
                                {{ Str::limit(strip_tags($welcome_speech?->content ?? '-'), 500, '...') }}
                            </p>
                            <a class="btn btn-theme border btn-md" href="{{ route('welcome.speech') }}">Lihat
                                selengkapnya</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Services
                                        ============================================= -->
    <div class="services-area carousel-shadow half-bg inc-thumb default-padding bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Kajian</h2>
                        <span class="devider"></span>
                        <p>
                            Kajian yang dipublikasikan oleh anggota Aisyiyah Bukittinggi. <br>

                            Kajian ini bertujuan untuk memberikan pemahaman yang lebih dalam tentang ajaran Islam dan
                            aplikasinya dalam kehidupan sehari-hari. kajian ini juga berisi tentang berbagai tema yang
                            berkaitan dengan Islam, sosial, pendidikan,
                            kesehatan, dan tema lainnya. <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="services-items services-carousel owl-carousel owl-theme text-center">
                        @foreach ($kajians as $kajian)
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ Storage::url($kajian->thumbnail) }}" alt="Thumb"
                                        style="height: 250px; width: 100%; object-fit: cover;">
                                    <div class="overlay">
                                        <a href="{{ route('kajian.detail', $kajian->slug) }}">Baca</a>
                                    </div>
                                </div>
                                <div class="info">
                                    <h4>
                                        <a href="{{ route('kajian.detail', $kajian->slug) }}">
                                            {{ Str::limit($kajian->title, 60) }}</a>
                                    </h4>
                                    <div class="meta">
                                        <p style="font-size: 12px; margin-bottom: 2px;">
                                            <a href="#">
                                                <i class="fas fa-user" style="font-size: 12px;"></i>
                                                {{ $kajian->user->name }}
                                            </a>
                                            <a href="#">
                                                <i class="fas fa-comments" style="font-size: 12px;"></i>
                                                {{ $kajian->kajianComment->count() }}
                                                Komentar
                                            </a>
                                        </p>
                                    </div>
                                    <p>
                                        {{ Str::limit(strip_tags($kajian->content), 120, '...') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->


    <!-- Start Gallery
                                        ============================================= -->
    <div class="gallery-area  default-padding">
        <div class="container">
            <div class="gallery-items-area text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="site-heading text-center">
                            <h2>Galeri Aisyiyah</h2>
                            <span class="devider"></span>
                            <p>
                                While mirth large of on front. Ye he greater related adapted proceed entered an. Through
                                it examine express promise no. Past add size game cold girl off how old
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">


                        <div class="row text-center masonary">
                            <div id="portfolio-grid" class="gallery-items col-3">
                                <!-- Single Item -->
                                @foreach ($list_album as $album)
                                    <div class="pf-item ">
                                        <div class="item">
                                            <a href="{{ route('gallery.detail', $album->slug) }}">
                                                <img src="{{ $album->getThumbnail() }}" alt="Thumb"
                                                    style="height: 300px; width: 100%; object-fit: cover;">
                                                <div class="item-inner">
                                                    <h4>{{ $album->title }}</h4>
                                                    <p> {{ $album->created_at->diffForHumans() }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->



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
<script>
    $.ajax({
        url: "{{ route('visit.ajax') }}",
        type: "GET",
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
</script>
    @endsection
