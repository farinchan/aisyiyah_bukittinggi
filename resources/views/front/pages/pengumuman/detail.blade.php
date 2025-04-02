@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('pengumuman.detail', $pengumuman->slug) }}">
    <link rel="canonical" href="{{ route('pengumuman.detail', $pengumuman->slug) }}">
    <meta property="og:image" content="{{ Storage::url($pengumuman->image) }}">
@endsection

@section('styles')
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
                                <img src="{{ $pengumuman->image ? Storage::url($pengumuman->image) : 'https://file.iainpare.ac.id/wp-content/uploads/2019/07/pengumuman.png' }}"
                                    alt="Thumb" style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                            <!-- Start Post Thumb -->

                            <div class="info">
                                <div class="date">
                                    <h4>
                                        {{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d M Y') }}
                                    </h4>
                                </div>
                                <h3>{{ $pengumuman->title }}</h3>

                                <p>
                                    {!! $pengumuman->content !!}
                                </p>

                                @if ($pengumuman->file)
                                    <object data="{{ Storage::url($pengumuman->file) }}" type="application/pdf"
                                        width="100%" height="800px">
                                        <embed src="{{ Storage::url($pengumuman->file) }}" type="application/pdf" />
                                    </object>
                                @endif


                                <!-- Start Post Tag s-->
                                <div class="post-tags share">
                                    <div class="tags">
                                        <span>Bagikan: </span>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('kajian.detail', $pengumuman->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>

                                        <a href="https://twitter.com/intent/tweet?url={{ route('kajian.detail', $pengumuman->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>

                                        <a href="https://api.whatsapp.com/send?text={{ route('kajian.detail', $pengumuman->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('kajian.detail', $pengumuman->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>

                                        <a href="https://www.pinterest.com/pin/create/button/?url={{ route('kajian.detail', $pengumuman->slug) }}"
                                            target="_blank">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- End Post Tags -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->
@endsection
