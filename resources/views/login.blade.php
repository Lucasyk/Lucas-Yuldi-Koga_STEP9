<x-layout>
    <section class="login-container">
        <h1>Login</h1>

        <form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <input type="email" name="email">
    <input type="password" name="password">

    <button>ログイン</button>
</form>
        <br>
        <p>
    Don't have an account?<br>
    <a href="{{ route('register') }}">Register</a>
</p>
    </section>
</x-layout>