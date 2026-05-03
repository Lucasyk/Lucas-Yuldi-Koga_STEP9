<x-layout>
    <section class="buy-page">
        <h1>購入確認</h1>

        <div class="buy-card">
            <h2>{{ $product->product_name }}</h2>

            <p class="buy-price">¥{{ number_format($product['price']) }}</p>

            <p>{{ $product['description'] }}</p>

            <form method="POST" action="{{ route('purchase.store', $product->id) }}">
    @csrf

    <div class="form-group">
        <label>個数</label>
        <input type="number" name="quantity" value="1" min="1">
    </div>

    <button class="buy-btn">購入する</button>
</form>

            <a href="{{ route('products.show', $product['id']) }}" class="back-link">
                ← 戻る
            </a>
        </div>
    </section>
</x-layout>