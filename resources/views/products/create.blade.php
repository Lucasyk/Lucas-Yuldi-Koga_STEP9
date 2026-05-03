<x-layout>
    <section class="product-register-page">
        <h1>商品登録</h1>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <label>商品名</label>
            <input type="text" name="product_name">

            <label>価格</label>
            <input type="number" name="price">

            <label>商品説明</label>
            <textarea name="description"></textarea>

            <label>在庫数</label>
            <input type="number" name="stock">

            <label>商品画像</label>
            <input type="file" name="img_path">

            <div class="form-buttons">
                <a href="{{ route('mypage') }}" class="gray-btn">戻る</a>
                <button type="submit" class="blue-btn">登録</button>
            </div>
        </form>
    </section>
</x-layout>