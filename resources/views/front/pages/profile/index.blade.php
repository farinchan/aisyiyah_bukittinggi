@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('profile', $profile->slug) }}">
    <link rel="canonical" href="{{ route('profile', $profile->slug) }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
@endsection

@section('content')
    @include('front.partials.breadcrumb')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">

        <h1>
            {{ $profile->name }}
        </h1>
        <p>
            {!! $profile->content !!}
        </p>
    </div>
@endsection
