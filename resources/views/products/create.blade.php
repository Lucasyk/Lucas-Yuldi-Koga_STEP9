<x-layout>
    <section class="product-create-page">
        <div class="product-create-card">
            <h1>商品登録</h1>

            <form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div class="form-group">
        <label>商品名</label>
        <input type="text" name="product_name">
    </div>

    <div class="form-group">
        <label>価格</label>
        <input type="number" name="price">
    </div>

    <div class="form-group">
        <label>在庫</label>
        <input type="number" name="stock">
    </div>

    <div class="form-group">
        <label>説明</label>
        <textarea name="description"></textarea>
    </div>

    <button class="submit-btn">登録する</button>
</form>
        </div>
    </section>
</x-layout>