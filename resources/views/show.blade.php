<x-layout>
    <section class="show-page">
        <h1>商品詳細</h1>

        <table class="show-table">
            <tr>
                <th>商品名:</th>
                <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
                <th>説明:</th>
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
                <th>金額:</th>
                <td>¥{{ number_format($product->price) }}</td>
            </tr>
            <tr>
                <th>会社:</th>
                <td>{{ $product->company->company_name ?? '未登録'  }}</td>
            </tr>
        </table>

        <div class="form-buttons">
            <a href="{{ route('shop.index') }}" class="gray-btn">戻る</a>

            <a href="{{ route('buy.page', $product->id) }}" class="blue-btn">
                購入画面へ
            </a>

            <form method="POST" action="{{ route('products.like', $product->id) }}">
                @csrf
                <button class="like-btn">いいね</button>
            </form>
        </div>
    </section>
</x-layout>