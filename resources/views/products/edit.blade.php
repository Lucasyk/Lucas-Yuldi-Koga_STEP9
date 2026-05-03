<x-layout>
    <section class="product-edit-page">
        <div class="product-edit-card">
            <h1>商品編集</h1>

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @csrf

                <div class="form-group">
                    <label>商品名</label>
                    <input type="text" name="product_name" value="{{ $product->product_name }}">
                </div>

                <div class="form-group">
                    <label>価格</label>
                    <input type="number" name="price" value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <label>商品説明</label>
                    <textarea name="description">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>在庫</label>
                    <input type="number" name="stock" value="{{ $product->stock }}">
                </div>


                <button class="save-btn">更新する</button>
            </form>

            <a href="{{ route('mypage') }}" class="back-link">← マイページへ戻る</a>
        </div>
    </section>
</x-layout>