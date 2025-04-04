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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        h5 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        p {
            font-size: 1rem;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 1.25rem 0.75rem;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }
    </style>
@endsection

@section('content')
    <main class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    @include('front.pages.user.__sidebar')
                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title">Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="text-center">
                                    <h5>Welcome to Dashboard</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
