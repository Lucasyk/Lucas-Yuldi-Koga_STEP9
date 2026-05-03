<!DOCTYPE html>
<html>
<head>
    <title>Auth</title>
    @vite('resources/css/app.css')
</head>
<body>
  <header>
    <div class="logo-container">
        <h1>CyTech EC</h1>
    </div>

    <div class="access-container">
        <a href="#">Home</a>

        @auth
            <a href="#">マイページ</a>
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
    <main class="auth-page">
        {{ $slot }}
    </main>
</body>
</html>