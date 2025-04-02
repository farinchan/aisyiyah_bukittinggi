@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('gallery.detail',  $album->slug) }}">
    <link rel="canonical" href="{{ route('gallery.detail', $album->slug) }}">
    <meta property="og:image" content="{{ Storage::url($album->image) }}">
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />

@endsection

@section('content')
@include('front.partials.breadcrumb')

<div class="about-area default-padding ">
    <div class="container">
        <div class="row">
            <div class="col-md-5 thumb">
                <img src="{{ $album->getThumbnail() }}" alt="Thumb">
            </div>
            <div class="col-md-7 tabs-items">
                <div id="tab1" class="tab-pane fade active in">
                    <div class="info title">
                        <h4>Album Foto</h4>
                        <h2>
                            {{ $album->title }}
                        </h2>
                        <p>
                            {{ $album->description }}
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<hr>
    <!-- Start Gallery
    ============================================= -->
    <div class="gallery-area default-padding">
        <div class="container">
            <div class="gallery-items-area text-center">
                <div class="row">

                    <div class="col-md-12">
                        {{-- <div class="mix-item-menu text-center">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".development">Development</button>
                            <button data-filter=".consulting">Consulting</button>
                            <button data-filter=".finance">Finance</button>
                            <button data-filter=".branding">Branding</button>
                            <button data-filter=".capital">Capital</button>
                        </div> --}}
                        <!-- End Mixitup Nav-->

                        <div class="row text-center masonary">
                            <div id="portfolio-grid" class="gallery-items col-3">
                                @forelse ($galleries as $galery)
                                <div class="pf-item ">
                                    <div class="item">
                                        <a href="{{ $galery->getFoto() }}" data-lightbox="gallery" data-title="{{ $album->title }} - {{ Carbon\Carbon::parse($galery->created_at)->translatedFormat('l, d F Y') }}">
                                            <img src="{{ $galery->getFoto() }}" alt="Thumb">
                                            <div class="item-inner">
                                                <h4>
                                                    <i class="fa fa-camera"></i>
                                                </h4>
                                                <p>
                                                    {{ Carbon\Carbon::parse($galery->created_at)->translatedFormat('l, d F Y') }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <p>Belum ada foto</p>
                                </div>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

@endsection

@section("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

@endsection
