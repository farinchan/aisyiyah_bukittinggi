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
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
@endsection

@section('content')
    @include('front.partials.breadcrumb')
    @php
        $job = json_decode($user->job ?? '[]');
    @endphp
    <!-- Start Team
                    ============================================= -->
    <div class="team-single-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="thumb">
                        <img src="{{ $user->getPhoto() }}" alt="Thumb" style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="info">
                        <h2>{{ $user->name }}</h2>
                        <span>{{ $user->keanggotaan }}</span>
                        {{-- <p>
                            INi adalah BIO
                        </p> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><i class="fas fa-user"></i> Nama</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-venus-mars"></i> Jenis Kelamin</td>
                                        <td>{{ $user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-envelope-open"></i> Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-briefcase"></i> Pekerjaan</td>
                                        <td>
                                            <ul class="unordered-list">
                                                @foreach ($job as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @if (collect($job)->contains('Ustadz') || collect($job)->contains('Ustadzah'))
                                        <tr>
                                            <td><i class="fas fa-book"></i> Bidang Kajian</td>
                                            <td>{{ $user->kepakaran }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Team -->
<hr>
    @if (collect($job)->contains('Ustadz') || collect($job)->contains('Ustadzah'))
        <!-- Start Blog
            ============================================= -->
        <div class="blog-area full-blog blog-standard default-padding">
            <div class="container">
                <div class="title" style="margin-bottom: 30px;">
                    <h2 style="margin-bottom: 5px;">Kajian dari {{ $user->name }}</h2>
                    <p>
                        {{ $user->name }} adalah seorang {{ $user->keanggotaan }} yang memiliki keahlian di bidang
                        {{ $user->kepakaran }}. Berikut adalah kajian-kajian yang telah dipublikasikan oleh beliau.
                        <br>
                    </p>
                </div>
                <div class="row">
                    <div class="blog-items">
                        <div class=" col-md-12 ">

                            <div class="blog-content row">
                                @foreach ($user->kajian as $kajian)
                                    <div class="col-md-6">
                                        <div class="single-item" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); ">
                                            <div class="item">
                                                <div class="thumb">
                                                    <a href="{{ route('kajian.detail', $kajian->slug) }}"><img
                                                            src="{{ Storage::url($kajian->thumbnail) }}" alt="Thumb"
                                                            style="height: 350px;" object-fit="cover" /></a>

                                                </div>
                                                <div class="info">
                                                    <div class="date">
                                                        <h4>{{ $kajian->created_at->format('d M Y') }}</h4>
                                                    </div>
                                                    <h4>
                                                        <a
                                                            href="{{ route('kajian.detail', $kajian->slug) }}">{{ $kajian->title }}</a>
                                                    </h4>
                                                    <div class="meta">
                                                        <ul>
                                                            <li>
                                                                <a
                                                                    href="{{ route('keanggotaan.detail', $kajian->user?->id) }}"><i
                                                                        class="fas fa-user"></i>
                                                                    {{ $kajian->user?->name }}</a>
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
                                                    <p> {{ Str::limit(strip_tags($kajian->content), 200, '...') }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog -->
    @endif
@endsection

@section('scripts')
@endsection
