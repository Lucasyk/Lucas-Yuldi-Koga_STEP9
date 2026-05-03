<!DOCTYPE html>
<head>
    <title>Layout</title>
    @vite("resources/css/app.css")
</head>
<body>
    <header>
    <div class="logo-container">
        <h1>CyTech EC</h1>
    </div>

    <div class="access-container">
        <a href="{{ route("shop.index") }}">Home</a>

        @auth
            <a href="{{ route('mypage') }}">マイページ</a>
            <h2>ログインユーザー: {{ auth()->user()->name }}</h2>

            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button>ログアウト</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}">ログイン</a>
        @endguest
        
    </div>
</header>
    <main>{{$slot}}</main>
    <footer>
        <a href="{{ route("inquiry") }}">お問い合わせ</a>
        <a href="#">Home</a>
        <a href="#">マイページ</a>
        <hr>
        <p>&copy; 2024 Company, Inc</p>
    </footer>
</body>
</html>