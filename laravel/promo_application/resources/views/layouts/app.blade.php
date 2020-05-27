<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <div class="header-hero-image">
                <img src="{{ url('/images/header-main.png') }}" alt="">
                <div class="header-img-overlay"></div>
                <div class="header-content">
                    <div class="header-top">
                        <nav>
                            <ul>
                                <a href="/">
                                    <li>Home</li>
                                </a>
                                <a href="/about">
                                    <li>About</li>
                                </a>
                                <a href="/blog">
                                    <li>Blog</li>
                                </a>
                                <a href="/contact">
                                    <li>Contact</li>
                                </a>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-bottom">
                        <h1 class="brand-name">Sleep Orbit</h1>
                        <h2 class="brand-baseline">The beauty of ASMR</h2>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="short-page-intro">
                <p>Sleep Orbit’s relaxing collection of sounds might just
                    be the perfect solution to regain control over your
                    impetuous brain.</p>
            </div>
            @yield('content')
        </main>

        <svg class="cursor" width="280" height="280" viewBox="0 0 280 280">
            <defs>
                <filter id="filter-1" x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox">
                    <feTurbulence type="fractalNoise" baseFrequency="0.02 0.15" numOctaves="3" result="warp" />
                    <feDisplacementMap xChannelSelector="R" yChannelSelector="G" scale="0" in="SourceGraphic"
                        in2="warp" />
                </filter>
            </defs>
            <circle class="cursor__inner" cx="140" cy="140" r="100" />
        </svg>

        <footer>
            <div class="footer-fx">
                <div class="footer-img-overlay"></div>
            </div>
            <div class="footer-wrapper">
                <div class="footer-top">
                    <div class="footer-left">
                        <h2>Sleep Orbit</h2>
                    </div>
                    <div class="footer-right">
                        <div class="footer-content">
                            <h3>Get in Touch</h3>
                            <ul>
                                <a href="">
                                    <li>hello@sleeporbit.com</li>
                                </a>
                                <a href="">
                                    <li>Tel. 0496 47 46 66</li>
                                </a>
                                <a href="">
                                    <li>Willem Van Nassaustraat 31,<br>
                                        9000 Gent</li>
                                </a>
                            </ul>
                        </div>
                        <div class="footer-content">
                            <h3>Privacy Policy</h3>
                            <ul>
                                <a href="">
                                    <li>Privacy</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>© 2020 by Sleep Orbit. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>