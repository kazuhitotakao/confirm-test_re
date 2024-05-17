<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <div class="header__title">
                    <h2>FashionablyLate</h2>
                </div>
                <nav>
                    <div class="header-nav">
                        @if (Request::is('register'))
                        <a class="header-nav__link" href="/login">login</a>
                        @elseif (Request::is('login'))
                        <a class="header-nav__link" href="/register">register</a>
                        @elseif (Request::is('admin'))
                        <form class="form" action="/logout" method="post">
                            @csrf
                            <button class="header-nav__button">logout</button>
                        </form>
                        @elseif (Request::is('admin/*'))
                        <form class="form" action="/logout" method="post">
                            @csrf
                            <button class="header-nav__button">logout</button>
                        </form>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>