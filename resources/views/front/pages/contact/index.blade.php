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

@endsection

@section('scripts')

@endsection
