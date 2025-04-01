@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('news.detail', $news->slug) }}">
    <link rel="canonical" href="{{ route('news.detail', $news->slug) }}">
    <meta property="og:image" content="{{ Storage::url($image) }}">
@endsection

@section('styles')
    {{-- <style>
        p img {
            max-width: 100%;
            height: auto;
        }

    </style> --}}
@endsection

@section('content')
    @include('front.partials.breadcrumb')
    <!-- Start Blog
                            ============================================= -->
    <div class="blog-area single full-blog right-sidebar default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-8">
                        <div class="item">

                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <img src="{{ Storage::url($news->thumbnail) }}" alt="Thumb" style="width: 100%;">
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="date">
                                    <h4>
                                        {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}
                                    </h4>
                                </div>
                                <h3>
                                    {{ $news->title }}
                                </h3>
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
                                            <a href="{{ route('news.category', $news->category->slug) }}"><i
                                                    class="fas fa-tag"></i>
                                                {{ $news->category->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    {!! $news->content !!}
                                </p>

                                <!-- Start Post Pagination -->
                                <div class="post-pagi-area">
                                    @if ($prev_news)
                                        <a href="{{ route('news.detail', $prev_news->slug) }}"><i
                                                class="fas fa-angle-double-left"></i> Berita Sebelumnya</a>
                                    @endif
                                    @if ($next_news)
                                        <a href="{{ route('news.detail', $next_news->slug) }}">Berita Selanjutnya <i
                                                class="fas fa-angle-double-right"></i></a>
                                    @endif
                                </div>
                                <!-- End Post Pagination -->

                                <!-- Start Post Tag s-->
                                <div class="post-tags share">
                                    <div class="tags">
                                        <span>Share: </span>

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('news.detail', $news->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="https://twitter.com/intent/tweet?url={{ route('news.detail', $news->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text={{ route('news.detail', $news->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('news.detail', $news->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>

                                        <a href="https://www.pinterest.com/pin/create/button/?url={{ route('news.detail', $news->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-pinterest"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- End Post Tags -->

                                <!-- Start Comments Form -->
                                <div class="comments-area">
                                    <div class="comments-title">
                                        <h4>
                                            {{ $news->comments->count() }} Komentar
                                        </h4>
                                        <div class="comments-list">
                                            @foreach ($comments as $comment)
                                                <div class="commen-item">
                                                    <div class="avatar">
                                                        <img src="@if ($comment->user_id) {{ $comment->user?->photo ? Storage::url($comment->user?->photo) : 'https://ui-avatars.com/api/?background=000C32&color=fff&name=' . $comment->user?->name }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $comment->name }} @endif"
                                                            alt="">
                                                    </div>
                                                    <div class="content">
                                                        <h5>
                                                            {{ $comment->name }}&nbsp;&nbsp;
                                                            @if ($comment->user_id == null)
                                                                <span class="badge badge-secondary">Guest</span>
                                                            @endif
                                                        </h5>
                                                        <div class="comments-info">
                                                            <p>{{ $comment->created_at->format('d M Y') }}</p>
                                                        </div>
                                                        <p>
                                                            {{ $comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                                @foreach ($comment->children as $children)
                                                    <div class="commen-item reply">
                                                        <div class="avatar">
                                                            <img src="@if ($children->user_id) {{ $children->user?->photo ? Storage::url($children->user?->photo) : 'https://ui-avatars.com/api/?background=000C32&color=fff&name=' . $children->user?->name }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $children->name }} @endif"
                                                                alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h5>
                                                                {{ $children->name }}&nbsp;&nbsp;
                                                                @if ($children->user_id == null)
                                                                    <span class="badge badge-secondary">Guest</span>
                                                                @endif
                                                            </h5>
                                                            <div class="comments-info">
                                                                <p>{{ $children->created_at->format('d M Y') }}</p>
                                                            </div>
                                                            <p>
                                                                {{ $children->comment }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="comments-form">
                                        <div class="title">
                                            <h4>Tambahkan Komentar</h4>
                                        </div>
                                        <form action="{{ route('news.comment', $news->slug) }}" class="contact-comments"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                @guest
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <!-- Name -->
                                                            <input name="name" class="form-control" placeholder="Nama *"
                                                                id="name" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <!-- Email -->
                                                            <input name="email" class="form-control" placeholder="Email *"
                                                                id="email" type="email" required>
                                                        </div>
                                                    </div>
                                                @endguest
                                                <div class="col-md-12">
                                                    <div class="form-group comments">
                                                        <!-- Comment -->
                                                        <textarea class="form-control" placeholder="Komentar" name="comment" id="comment" required></textarea>
                                                    </div>
                                                    <div class="form-group full-width submit">
                                                        <button type="submit">
                                                            Kirim Komentar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Comments Form -->
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
                                        <input type="text" class="form-control" placeholder="Cari Disini"
                                            name="q" value="{{ request()->q }}">
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
                                                <a
                                                    href="{{ route('news.detail', $newsLatest->slug) }}">{{ $newsLatest->title }}</a>
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
                                        @if ($setting_web->twitter)
                                            <li class="twitter">
                                                <a href="{{ $setting_web->twitter }}">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($setting_web->youtube)
                                            <li class="pinterest">
                                                <a href="{{ $setting_web->youtube }}">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if ($setting_web->instagram)
                                            <li class="pinterest">
                                                <a href="{{ $setting_web->instagram }}">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item tags">
                                <div class="title">
                                    <h4>tags</h4>
                                </div>
                                <div class="sidebar-info">
                                    @php
                                        $tags = explode(',', $news->meta_keywords);
                                        // dd($tags);
                                    @endphp
                                    <ul>
                                        @foreach ($tags as $tag)
                                            <li>
                                                <a href="#">{{ $tag }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <!-- End Start Sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
