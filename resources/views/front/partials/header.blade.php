  <!-- Start Header Top
    ============================================= -->
  <div class="top-bar-area inline inc-border" style="background: linear-gradient(90deg, #2c368b 0%, #64C790 100%)">
      <div class="container">
          <div class="row">
              <div class="col-md-7 address-info text-left">
                  <div class="info box">
                      <ul>
                          <li>
                              <i class="fas fa-cloud" style="color: #fff"></i>
                              <p style="color: #fff; font-weight: 500">
                                  {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }} /
                                  {{ \Alkoumi\LaravelHijriDate\Hijri::Date('l d F Y') }}
                              </p>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-5 info-right">
                  <div class="item-flex border-less">
                      <div class="social">
                          <ul>
                              @if ($setting_web->facebook)
                                  <li>
                                      <a href="{{ $setting_web->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                  </li>
                              @endif
                              @if ($setting_web->twitter)
                                  <li>
                                      <a href="{{ $setting_web->twitter }}"><i class="fab fa-twitter"></i></a>
                                  </li>
                              @endif
                              @if ($setting_web->instagram)
                                  <li>
                                      <a href="{{ $setting_web->instagram }}"><i class="fab fa-instagram"></i></a>
                                  </li>
                              @endif
                              @if ($setting_web->youtube)
                                  <li>
                                      <a href="{{ $setting_web->youtube }}"><i class="fab fa-youtube"></i></a>
                                  </li>
                              @endif
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Header Top -->


  <!-- Header
    ============================================= -->
  <header id="home">

      <!-- Start Navigation -->
      <nav class="navbar navbar-default active-border-top attr-border navbar-sticky bootsnav">

          <!-- Start Top Search -->
          <div class="container">
              <div class="row">
                  <div class="top-search">
                      <div class="input-group">
                          <form action="{{ route('keanggotaan') }}" method="GET">
                              <input type="text" name="nama" class="form-control" placeholder="Cari Anggota">
                              <button type="submit">
                                  <i class="fas fa-search"></i>
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End Top Search -->

          <div class="container">

              <!-- Start Atribute Navigation -->
              <div class="attr-nav">
                  <ul>
                      <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                      @auth
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-user"></i>
                              </a>
                              <ul class="dropdown-menu" style="width: 200px;">
                                  <li><a href="{{ route('user.profile') }}">Profile Saya</a></li>
                                  @if (Auth::user()->hasRole('admin'))
                                      <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                  @endif
                                  <li><a href="{{ route('logout') }}">Logout</a></li>
                              </ul>
                          </li>
                      @endauth
                      @guest
                          {{-- <li class="side-menu"><a href="{{ route("login") }}"><i class="fas fa-sign-in-alt"></i> &nbsp;Login</a></li> --}}
                          <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a></li>
                      @endguest
                  </ul>

              </div>
              <!-- End Atribute Navigation -->

              <!-- Start Header Navigation -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                      <i class="fa fa-bars"></i>
                  </button>
                  <a class="navbar-brand" href="{{ route("home") }}">
                      <img src="{{ Storage::url($setting_web->logo) }}" class="logo" alt="Logo"
                          style="height: 50px">
                  </a>
              </div>
              <!-- End Header Navigation -->

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                      <li class="@if (request()->routeIs('home')) active @endif">
                          <a href="{{ route('home') }}">Home</a>
                      </li>
                      <li class="dropdown @if (request()->routeIs('profile.*')) active @endif">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile</a>
                          <ul class="dropdown-menu">
                              @php
                                  $profiles = \App\Models\Profile::all();
                              @endphp
                              @foreach ($profiles as $profile)
                                  <li>
                                      <a href="{{ route('profile', $profile->slug) }}">{{ $profile->name }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>
                      <li class="dropdown @if (request()->routeIs('news.*')) active @endif">
                          <a href="{{ route('news') }}" class="dropdown-toggle active"
                              data-toggle="dropdown">Berita</a>
                          <ul class="dropdown-menu">
                              @php
                                  $categories = \App\Models\NewsCategory::all();
                              @endphp
                              @foreach ($categories as $category)
                                  <li><a
                                          href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>
                      <li class="dropdown @if (request()->routeIs('kajian.*')) active @endif">
                          <a href="{{ route('kajian') }}">Kajian</a>
                      </li>
                      <li class="dropdown @if (request()->routeIs('asset.*')) active @endif">
                          <a href="{{ route('asset') }}">Asset</a>
                      </li>
                      <li class="dropdown @if (request()->routeIs('keanggotaan.*')) active @endif">
                          <a href="{{ route('keanggotaan') }}">Keanggotaan</a>
                      </li>
                      <li class="dropdown @if (request()->routeIs('ortom.*')) active @endif">
                          <a href="#" class="dropdown-toggle active" data-toggle="dropdown">ORTOM</a>
                          <ul class="dropdown-menu">
                              @php
                                  $list_ortom = \App\Models\OrganisasiOtonom::all();
                              @endphp
                              @foreach ($list_ortom as $ortom)
                                  <li><a href="{{ route('ortom', $ortom->slug) }}">{{ $ortom->name }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>
                      <li class="dropdown @if (request()->routeIs('contact')) active @endif">
                          <a href="{{ route('contact') }}">Kontak</a>
                      </li>
                  </ul>
              </div><!-- /.navbar-collapse -->
          </div>

          <!-- Start Side Menu -->
          <div class="side">
              <a href="#" class="close-side"><i class="fa fa-times"></i></a>
              <div class="widget">
                  <h4 class="title">About Us</h4>
                  <p>
                      Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat
                      hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few
                      blind.
                  </p>
              </div>
              <div class="widget address">
                  <h4 class="title">Office Location</h4>
                  <ul>
                      <li>
                          <i class="fas fa-phone"></i>
                          +123 456 7890
                      </li>
                      <li>
                          <i class="fas fa-map-marker-alt"></i>
                          California, TX 70240
                      </li>
                      <li>
                          <i class="fas fa-envelope-open"></i>
                          info@yourdomain.com
                      </li>
                  </ul>
              </div>
              <div class="widget opening-hours">
                  <h4>Opening Hours</h4>
                  <ul>
                      <li>
                          Mon - Fri <span>9:00 - 21:00</span>
                      </li>
                      <li>
                          Saturday <span>10:00 - 16:00</span>
                      </li>
                  </ul>
              </div>
              <div class="widget social">
                  <h4 class="title">Connect With Us</h4>
                  <ul class="link">
                      <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                      <li class="pinterest"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                      <li class="dribbble"><a href="#"><i class="fab fa-dribbble"></i></a></li>
                  </ul>
              </div>
          </div>
          <!-- End Side Menu -->

      </nav>
      <!-- End Navigation -->

  </header>
  <!-- End Header -->
