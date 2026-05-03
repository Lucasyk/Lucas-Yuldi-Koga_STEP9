<x-layout>
    <section class="product-detail">
        <div class="product-detail-card">
            <h1>{{ $product['name'] }}</h1>

            <p class="product-detail-price">
                ¥{{ number_format($product['price']) }}
            </p>

            <p class="product-detail-description">
                {{ $product['description'] }}
            </p>

            <div class="product-actions">
                <form method="POST" action="#">
                    @csrf
                    <button class="cart-btn">カートに追加</button>
                </form>

                <form method="POST" action="{{ route('products.like', $product->id) }}">
    @csrf
    <button class="like-btn">♡ いいね</button>
</form>
                <a href="{{ route('buy.page', $product['id']) }}" class="buy-link">
    今すぐ購入
</a>
            </div>

            <a class="back-link" href="{{ route('shop.index') }}">← 商品一覧へ戻る</a>
        </div>
    </section>
</x-layout>