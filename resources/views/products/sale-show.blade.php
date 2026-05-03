<x-layout>
    <section class="sale-show-page">
        <h1>出品商品詳細</h1>

        <p>商品名：{{ $product->product_name }}</p>
        <p>説明：{{ $product->description }}</p>

        <p>画像：</p>
        @if ($product->img_path)
            <img src="{{ asset('storage/' . $product->img_path) }}" class="sale-show-img">
        @else
            <div class="no-image">No Image</div>
        @endif

        <p>金額：￥{{ number_format($product->price) }}</p>

        <div class="form-buttons">
            <a href="{{ route('products.edit', $product->id) }}" class="blue-btn">編集</a>

            <form method="POST" action="{{ route('products.delete', $product->id) }}">
    @csrf
    <button class="delete-btn">削除する</button>
</form>

            <a href="{{ route('mypage') }}" class="gray-btn">戻る</a>
        </div>
    </section>
</x-layout>