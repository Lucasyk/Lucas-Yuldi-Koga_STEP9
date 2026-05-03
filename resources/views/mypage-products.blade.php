<x-layout>
    <section class="my-products-page">
        <h1>出品中の商品</h1>

        <div class="my-products-list">
            @foreach ($products as $product)
                <div class="my-product-card">
                    <div>
                        <h2>{{ $product['name'] }}</h2>
                        <p>¥{{ number_format($product['price']) }}</p>
                    </div>

                    <div class="my-product-actions">
                        <a href="{{ route('products.show', $product->id) }}">詳細</a>
                        <a href="{{ route('products.edit', $product->id) }}">編集</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>