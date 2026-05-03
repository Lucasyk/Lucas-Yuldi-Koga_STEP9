<x-layout>
    <section class="inquiry-page">
        <div class="inquiry-card">
            <h1>お問い合わせ</h1>
@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif
            <form method="POST" action="{{ route("inquiry.submit") }}">
                @csrf

                <div class="form-group">
                    <label>お名前</label>
                    <input type="text" name="name">
                </div>

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email">
                </div>

                <div class="form-group">
                    <label>お問い合わせ内容</label>
                    <textarea name="message"></textarea>
                </div>

                <button class="submit-btn">送信する</button>
            </form>
        </div>
    </section>
</x-layout>