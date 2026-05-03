<x-layout>
    <section class="buy-page">
        <h1>商品購入</h1>

        <form method="POST" action="{{ route('purchase.store', $product->id) }}">
            @csrf

            <table class="buy-table">
                <tr>
                    <th>商品名</th>
                    <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                    <th>商品説明</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                  <th>画像:</th>
                  <td>@if ($product->img_path)
    <img src="{{ asset('storage/' . $product->img_path) }}" alt="{{ $product->product_name }}" class="product-img">
@else
    <div class="no-image">No Image</div>
@endif</td>
                </tr>
                <tr>
                    <th>価格</th>
                    <td>¥{{ number_format($product->price) }}</td>
                </tr>
                <tr>
                  <th>残り</th>
                  <td>{{$product->stock}}</td>
                </tr>
                <tr>
                    <th>購入数</th>
                    <td>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                    </td>
                </tr>
            </table>

            <div class="form-buttons">
                <a href="{{ route('products.show', $product->id) }}" class="gray-btn">戻る</a>
                <button type="submit" class="blue-btn">購入</button>
            </div>
        </form>
    </section>
</x-layout>