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
    <style>
    </style>
@endsection

@section('content')
    @include('front.partials.breadcrumb')
    <!-- Start Blog
        ============================================= -->
    <div class="blog-area full-blog blog-standard default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class=" col-md-12 ">

                        <div class="blog-content row">
                            @foreach ($list_kajian as $kajian)
                                <div class="col-md-6">
                                    <div class="single-item" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); ">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="{{ route('kajian.detail', $kajian->slug) }}"><img src="{{ Storage::url($kajian->thumbnail) }}" alt="Thumb" style="height: 350px;" object-fit="cover" /></a>

                                            </div>
                                            <div class="info">
                                                <div class="date">
                                                    <h4>{{ $kajian->created_at->format('d M Y') }}</h4>
                                                </div>
                                                <h4>
                                                    <a href="{{ route('kajian.detail', $kajian->slug) }}">{{ $kajian->title }}</a>
                                                </h4>
                                                <div class="meta">
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('keanggotaan.detail', $kajian->user?->id) }}"><i
                                                                    class="fas fa-user"></i> {{ $kajian->user?->name }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-comments"></i>
                                                                {{ $kajian->kajianComment->count() }} Komentar</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fas fa-eye"></i>
                                                                {{ $kajian->kajianViewer->count() }} Dilihat</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>  {{ Str::limit(strip_tags($kajian->content), 200, '...') }}</p>
                                                <a class="btn btn-theme border btn-md" href="{{ route('kajian.detail', $kajian->slug) }}">Lihat Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12 pagi-area">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        @if ($list_kajian->onFirstPage())
                                            <li>
                                                <a href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                            </li>
                                        @else
                                            <li>
                                                <a
                                                    href="{{ route('kajian', ['page' => $list_kajian->currentPage() - 1, 'q' => request()->q]) }}"><i
                                                        class="fas fa-long-arrow-alt-left"></i></a>
                                            </li>
                                        @endif

                                        @php
                                            // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                            $start = max($list_kajian->currentPage() - 2, 1);
                                            $end = min($start + 4, $list_kajian->lastPage());
                                        @endphp

                                        @if ($start > 1)
                                            <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                            <li><a href="#">...</a></li>
                                        @endif

                                        @foreach ($list_kajian->getUrlRange($start, $end) as $page => $url)
                                            @if ($page == $list_kajian->currentPage())
                                                <li class="active"><a href="#">{{ $page }}</a></li>
                                            @else
                                                <li><a
                                                        href="{{ route('kajian', ['page' => $page, 'q' => request()->q]) }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        @if ($end < $list_kajian->lastPage())
                                            <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                            <li><a href="#">...</a></li>
                                        @endif

                                        @if ($list_kajian->hasMorePages())
                                            <li><a
                                                    href="{{ route('kajian', ['page' => $list_kajian->currentPage() + 1, 'q' => request()->q]) }}"><i
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
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
