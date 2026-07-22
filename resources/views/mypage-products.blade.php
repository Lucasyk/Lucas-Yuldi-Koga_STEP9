<x-layout>
    <section class="my-products-page">
        <h1>出品中の商品</h1>

        <div class="my-products-list">
            @foreach ($products as $product)
                <div class="my-product-card">

                    <div>
                        @if ($product->img_path)
                            <img src="{{ asset('storage/' . $product->img_path) }}"
                                 class="product-img">
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </div>

                    <div>
                        <h2>{{ $product->product_name }}</h2>

                        <p>
                            ¥{{ number_format($product->price) }}
                        </p>

                        <p>
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="my-product-actions">
                        <a href="{{ route('products.sale.show', $product->id) }}">
                            詳細
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}">
                            編集
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
</x-layout>