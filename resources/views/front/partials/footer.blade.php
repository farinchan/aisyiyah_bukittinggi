<!-- Start Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="row">

                <div class="f-items default-padding">

                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item about">
                            <img src="{{ asset('front/img/logo-light.png') }}" alt="Logo">
                            <p>
                                {{ strip_tags(Str::limit($setting_web->about, 200)) }}
                            </p>

                        </div>
                        <br>
                        <p style="color: #fff; margin-bottom: 0 ">Kunjungan</p>
                        <!-- Default Statcounter code for Muhammadiyah Bukittinggi https://muhammadiyahbukittinggi.org -->
                        <script type="text/javascript">
                            var sc_project = 13033338;
                            var sc_invisible = 0;
                            var sc_security = "bb7fb319";
                            var scJsHost = "https://";
                            document.write("<sc" + "ript type='text/javascript' src='" +
                                scJsHost +
                                "statcounter.com/counter/counter.js'></" + "script>");
                        </script>
                        <noscript>
                            <div class="statcounter">
                                <a title="Web Analytics Made Easy - Statcounter" href="https://statcounter.com/"
                                    target="_blank"><img class="statcounter"
                                        src="https://c.statcounter.com/13033338/0/bb7fb319/0/"
                                        alt="Web Analytics Made Easy - Statcounter"
                                        referrerPolicy="no-referrer-when-downgrade">
                                </a>
                            </div>
                        </noscript>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item link">
                            <h4>WebLink</h4>
                            <ul>
                                <li>
                                    <a href="{{ route("home") }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route("news") }}">Berita</a>
                                </li>
                                <li>
                                    <a href="{{ route("kajian") }}">Kajian</a>
                                </li>
                                <li>
                                    <a href="{{ route("asset") }}">Asset</a>
                                </li>
                                <li>
                                    <a href="{{ route("keanggotaan") }}">Keanggotaan</a>
                                </li>
                                <li>
                                    <a href="{{ route("contact") }}">kontak</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 item">
                        <div class="f-item about">
                            <h4>Informasi</h4>
                            <p>
                                {{ $setting_web->address }}
                            </p>
                            <ul>
                                <li>
                                    <span>Email: </span> <a
                                        href="mailto:{{ $setting_web->email }}">{{ $setting_web->email }}</a>
                                </li>
                            </ul>
                            <h2><i class="fas fa-phone"></i> +123 456 7890</h2>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-dark-hard text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; Copyright <script>
                            document.write(new Date().getFullYear());
                        </script>
                         {{ $setting_web->name }}. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-right link">
                        <ul>
                            <li>
                                <a href="{{ route("contact") }}">Contact</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="https://torkatatech.com">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->
