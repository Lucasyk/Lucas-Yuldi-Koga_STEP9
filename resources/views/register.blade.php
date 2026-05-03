<x-layout>
    <section class="auth-card">
        <h1>Register</h1>

        <form method="POST" action="{{ route("register.submit"); }}">
            @csrf

            <div>
                <label>Name</label>
                <input type="text" name="name">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div>
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>

            <button type="submit">登録</button>
        </form>

        <p>
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </section>
</x-layout>  