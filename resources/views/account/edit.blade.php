<x-layout>
    <section class="account-edit">
        <div class="account-edit-card">
            <h1>アカウント編集</h1>

            <form method="POST" action="#">
                @csrf

                <div class="form-group">
                    <label>名前</label>
                    <input type="text" name="name" value="{{ session('user.name') ?? '' }}">
                </div>

                <div class="form-group">
                    <label>メール</label>
                    <input type="email" name="email">
                </div>

                <button class="save-btn">更新する</button>
            </form>

            <a href="{{ route('mypage') }}" class="back-link">← マイページへ戻る</a>
        </div>
    </section>
</x-layout>