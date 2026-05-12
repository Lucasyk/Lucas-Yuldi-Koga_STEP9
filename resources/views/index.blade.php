<x-layout>
    <section class="product-list-page">
        <h1>商品一覧</h1>

        <form method="GET" action="{{ route('shop.index') }}" class="search-form">
            <input type="text" name="keyword" placeholder="商品名" value="{{ request('keyword') }}">

            <input type="number" name="min_price" placeholder="最低価格" value="{{ request('min_price') }}">

            <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}">

            <button type="submit" class="blue-btn">検索</button>
        </form>

        <table class="product-list-table">
            <thead>
                <tr>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>商品説明</th>
                    <th>画像</th>
                    <th>料金</th>
                    <th>詳細</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if ($product->img_path)
                                <img src="{{ asset('storage/' . $product->img_path) }}" class="product-img">
                            @else
                                画像なし
                            @endif
                        </td>
                        <td>¥{{ number_format($product->price) }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="green-btn">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>