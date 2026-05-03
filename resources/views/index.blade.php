<x-layout>
    <section class="product-list">
        <h1>商品一覧</h1>

        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <h2>{{ $product->product_name }}</h2>

                    <p class="price">¥{{ number_format($product->price) }}</p>

                    <p>{{ $product->description }}</p>

                    <a href="{{ route('products.show', $product->id) }}">
                        詳細を見る
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>