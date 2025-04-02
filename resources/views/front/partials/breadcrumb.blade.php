    <!-- Start Site Title
        ============================================= -->
    <div class="site-title-area text-center shadow dark bg-fixed text-light"
        style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        @isset($title)
                            {{ $title }}
                        @endisset
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Site Title -->

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area text-center bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        @isset($breadcrumbs)
                            @foreach ($breadcrumbs as $breadcrumb)
                                @if ($loop->first)
                                    <li>
                                        @if ($breadcrumb['link'])
                                            <a href="{{ $breadcrumb['link'] }}">
                                                <i class="fas fa-home"></i>
                                                {{ $breadcrumb['name'] }}
                                            </a>
                                        @else
                                            <i class="fas fa-home"></i>
                                            {{ $breadcrumb['name'] }}
                                        @endif
                                    </li>
                                @elseif (!$loop->last)
                                    <li>
                                        @if ($breadcrumb['link'])
                                            <a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['name'] }}</a>
                                        @else
                                            {{ $breadcrumb['name'] }}
                                        @endif
                                    </li>
                                @else
                                    <li class=" active">
                                        {{ $breadcrumb['name'] }}
                                    </li>
                                @endif
                            @endforeach
                            {{-- <li class="breadcrumb-item active" aria-current="page">Blog Single</li> --}}
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
