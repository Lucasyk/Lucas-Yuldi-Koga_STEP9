<x-layout>
    <section class="account-edit">
        <div class="account-edit-card">
            <h1>アカウント編集</h1>

            <form method="POST" action="{{ route('account.update') }}">
    @csrf

    <div class="form-group">
        <label>ユーザ名</label>
        <input type="text" name="username" value="{{ old('username', $user->username) }}">
    </div>

    <div class="form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
    </div>

    <div class="form-group">
        <label>名前</label>
        <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}">
    </div>

    <div class="form-group">
        <label>名前（カタカナ）</label>
        <input type="text" name="kana" value="{{ old('kana', $user->kana) }}">
    </div>

    <button class="save-btn">更新する</button>
</form>

            <a href="{{ route('mypage') }}" class="back-link">← マイページへ戻る</a>
        </div>
    </section>
</x-layout>