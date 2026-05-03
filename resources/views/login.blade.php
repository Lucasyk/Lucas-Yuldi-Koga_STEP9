<x-layout>
    <section class="login-container">
        <h1>ログイン</h1>

        <form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <h3>メールアドレス:</h3>
    <input type="email" name="email">
    <h3>パスワード:</h3>
    <input type="password" name="password">
    <br>
    <button>ログイン</button>
</form>
        <br>
        <p>
    Don't have an account?<br>
    <a href="{{ route('register') }}">Register</a>
</p>
    </section>
</x-layout>