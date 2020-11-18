<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('tabTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="discription" content="フルスタックエンジニアを目指す文系大学生の技術ブログ。経済学部 長浜光輝">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('/css/app.css') }}"> -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" integrity="sha384-9/D4ECZvKMVEJ9Bhr3ZnUAF+Ahlagp1cyPC7h5yDlZdXs4DQ/vRftzfd+2uFUuqS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header_nav">
                <div class="header_nav_logo">
                    <a href="{{ url('/') }}"><img src="/img/header_logo.png" alt="ロゴ"></a>
                </div>
                <div class="header_nav_btn">
                    <div class="header_nav_spBtn">
                    <span class="material-icons show" id="open_icon">menu</span>
                </div>
                    <div class="header_nav_spBtn">
                        <span class="material-icons hide" id="close_icon">close</span>
                    </div>
                </div>
                <div class="header_nav_overlay hide">
                    <ul class="header_nav_items">
                        @yield('link')
                    </ul>
                </div>
            </div>
        </header>
        <main class="main">
            @yield('content')
        </main>
        <sideber class="sideber">

        </sideber>
        <footer class="footer">
            <div class="footer_service">
                <ul class="footer_service_items">
                    <li class="footer_service_item">
                        <a href="https://qiita.com/cygnu" taraget="_blank">
                            <i class="fas fa-file-alt fa-fw"></i>
                        </a>
                    </li>
                    <li class="footer_service_item">
                        <a href="https://twitter.com/ACEDHKXyrn6b9aL" taraget="_blank">
                            <i class="fab fa-twitter fa-fw"></i>
                        </a>
                    </li>
                    <li class="footer_service_item">
                        <a href="https://github.com/cygnu" taraget="_blank">
                            <i class="fab fa-github fa-fw"></i>
                        </a>
                    </li>
                    <li class="footer_service_item">
                        <a href="https://www.youtube.com/channel/UC4Ylcg-SLbe90cAmeW63JeQ" taraget="_blank">
                            <i class="fab fa-youtube fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer_nav">
                <ul class="footer_nav_items">
                    <li class="footer_nav_item"><a href="/sitemap/">サイトマップ</a></li>
                    <li class="footer_nav_item"><a href="/career/">プロフィール</a></li>
                    <li class="footer_nav_item"><a href="https://twitter.com/ACEDHKXyrn6b9aL" taraget="_blank">お問い合わせ</a></li>
                </ul>
            </div>
            <div class="footer_copyright">
                &copy; 2020 KOUKI NAGAHAMA
            </div>
        </footer>
        <script src="/js/header.js"></script>
        <!-- <script src="/js/main.js"></script> -->
    </div>
</body>
</html>
