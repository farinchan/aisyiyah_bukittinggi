@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('kajian.detail', $kajian->slug) }}">
    <link rel="canonical" href="{{ route('kajian.detail', $kajian->slug) }}">
    <meta property="og:image" content="{{ Storage::url($image) }}">
@endsection

@section('content')
@include('front.partials.breadcrumb')

    <!-- Start Blog
            ============================================= -->
    <div class="blog-area single full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
                        <div class="item">

                            <!-- Start Post Thumb -->
                            <div class="thumb">
                                <img src="{{ Storage::url($kajian->thumbnail) }}" alt="Thumb">
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="date">
                                    <h4>
                                        {{ \Carbon\Carbon::parse($kajian->created_at)->format('d M Y') }}
                                    </h4>
                                </div>
                                <h3>{{ $kajian->title }}</h3>
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
                                <p>
                                    {!! $kajian->content !!}
                                </p>

                                <!-- Start Post Pagination -->
                                <div class="post-pagi-area">
                                    @if ($prev_kajian)
                                    <a href="{{ route('kajian.detail', $prev_kajian->slug) }}"><i
                                            class="fas fa-angle-double-left"></i> Kajian Sebelumnya</a>
                                @endif
                                @if ($next_kajian)
                                    <a href="{{ route('kajian.detail', $next_kajian->slug) }}">Kajian Selanjutnya <i
                                            class="fas fa-angle-double-right"></i></a>
                                @endif                                </div>
                                <!-- End Post Pagination -->

                                <!-- Start Post Tag s-->
                                <div class="post-tags share">
                                    <div class="tags">
                                        <span>Bagikan: </span>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('kajian.detail', $kajian->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="https://twitter.com/intent/tweet?url={{ route('kajian.detail', $kajian->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text={{ route('kajian.detail', $kajian->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('kajian.detail', $kajian->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>

                                        <a href="https://www.pinterest.com/pin/create/button/?url={{ route('kajian.detail', $kajian->slug) }}"
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
                                            {{ $kajian->kajianComment->count() }} Komentar
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
                                        <form action="{{ route('kajian.comment', $kajian->slug) }}" class="contact-comments"
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
