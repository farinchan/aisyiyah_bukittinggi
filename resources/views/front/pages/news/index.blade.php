@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('news') }}">
    <link rel="canonical" href="{{ route('news') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('content')
    <!-- Start Blog
                                        ============================================= -->
    <div class="blog-area full-blog right-sidebar default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">

                        @isset($category)
                            <div class="title" style="margin-bottom: 30px;">
                                <h2 style="margin-bottom: 5px;">Kategori {{ $category->name }}</h2>
                                <p>{{ $category->description }}</p>
                            </div>

                        @endisset
                        @foreach ($list_news as $news)
                            <div class="single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="{{ route('news.detail', $news->slug) }}">
                                            <img src="{{ Storage::url($news->thumbnail) }}" alt="Thumb">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <h4>{{ \Carbon\Carbon::parse($news->created_at)->format('d M, Y') }}</h4>
                                        </div>
                                        <h4>
                                            <a href="{{ route('news.detail', $news->slug) }}">{{ $news->title }}</a>
                                        </h4>
                                        <div class="meta">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('keanggotaan.detail', $news->user?->id) }}"><i
                                                            class="fas fa-user"></i> {{ $news->user?->name }}</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-comments"></i>
                                                        {{ $news->comments->count() }} Komentar</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fas fa-eye"></i>
                                                        {{ $news->viewers->count() }} Dilihat</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('news.category', $news->category->slug) }}"><i class="fas fa-tag"></i>
                                                        {{ $news->category->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>{{ Str::limit(strip_tags($news->content), 170) }}</p>
                                        <a class="btn btn-theme border btn-md"
                                            href="{{ route('news.detail', $news->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        @if ($list_news->onFirstPage())
                                            <li>
                                                <a href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                            </li>
                                        @else
                                            <li>
                                                <a
                                                    href="{{ route('news', ['page' => $list_news->currentPage() - 1, 'q' => request()->q]) }}"><i
                                                        class="fas fa-long-arrow-alt-left"></i></a>
                                            </li>
                                        @endif

                                        @php
                                            // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                            $start = max($list_news->currentPage() - 2, 1);
                                            $end = min($start + 4, $list_news->lastPage());
                                        @endphp

                                        @if ($start > 1)
                                            <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                            <li><a href="#">...</a></li>
                                        @endif

                                        @foreach ($list_news->getUrlRange($start, $end) as $page => $url)
                                            @if ($page == $list_news->currentPage())
                                                <li class="active"><a href="#">{{ $page }}</a></li>
                                            @else
                                                <li><a
                                                        href="{{ route('news', ['page' => $page, 'q' => request()->q]) }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($end < $list_news->lastPage())
                                            <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                            <li><a href="#">...</a></li>
                                        @endif

                                        @if ($list_news->hasMorePages())
                                            <li><a
                                                    href="{{ route('news', ['page' => $list_news->currentPage() + 1, 'q' => request()->q]) }}"><i
                                                        class="fas fa-long-arrow-alt-right"></i></a></li>
                                        @else
                                            <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="sidebar col-md-4">
                        <aside>
                            <div class="sidebar-item search">
                                <div class="title">
                                    <h4>Cari Berita</h4>
                                </div>
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Cari Disini" name="q"
                                            value="{{ request()->q }}">
                                        <input type="submit" value="Cari">
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>List Kategori</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('news.category', $category->slug) }}">
                                                    <p>{{ $category->name }}</p>
                                                    <span>{{ $category->news->count() }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Berita Terbaru</h4>
                                </div>
                                <ul>
                                    @foreach ($latest_news as $newsLatest)
                                        <li>
                                            <div class="thumb">
                                                <a href="{{ route('news.detail', $newsLatest->slug) }}">
                                                    <img src="{{ Storage::url($newsLatest->thumbnail) }}" alt="Thumb">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <a href="{{ route('news.detail', $newsLatest->slug) }}">{{ $newsLatest->title }}</a>
                                                <div class="meta-title">
                                                    <span class="post-date">
                                                        {{ \Carbon\Carbon::parse($newsLatest->created_at)->format('d M, Y') }}</span>
                                                    </span> - By <a
                                                        href="{{ route('keanggotaan.detail', $newsLatest->user?->id) }}">{{ $newsLatest->user?->name }}</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar-item gallery">
                                <div class="title">
                                    <h4>Gallery</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        @foreach ($gallery_latest as $gallery)
                                            <li>
                                                <a href="{{ route('gallery.detail', $gallery->album?->slug) }}">
                                                    <img src="{{ $gallery->getFoto() }}" alt="thumb">
                                                </a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item social-sidebar">
                                <div class="title">
                                    <h4>Ikuti Kami</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        @if ($setting_web->facebook)
                                            <li class="facebook">
                                                <a href="{{ $setting_web->facebook }}">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($setting_web->twitter)
                                        <li class="twitter">
                                            <a href="{{ $setting_web->twitter }}">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @if($setting_web->youtube)
                                        <li class="pinterest">
                                            <a href="{{ $setting_web->youtube }}">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @if($setting_web->instagram)
                                        <li class="pinterest">
                                            <a href="{{ $setting_web->instagram }}">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="sidebar-item tags">
                                <div class="title">
                                    <h4>tags</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="#">Medical</a>
                                        </li>
                                        <li><a href="#">Health</a>
                                        </li>
                                        <li><a href="#">Patient</a>
                                        </li>
                                        <li><a href="#">Doctor</a>
                                        </li>
                                        <li><a href="#">Hospital</a>
                                        </li>
                                        <li><a href="#">Happy</a>
                                        </li>
                                        <li><a href="#">Children</a>
                                        </li>
                                        <li><a href="#">science</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
